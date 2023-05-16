<?php

namespace App\Http\Controllers;

use App\Tender;
use App\Language;
use Illuminate\Http\Request;
use App\Helpers\SanitizeInput;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TenderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $tenders =  Tender::orderBy('id', 'DESC')->get();
        return view('backend.pages.tender.index', compact('tenders'));
    }

    public function create()
    {
        $all_language = Language::all();
        return view('backend.pages.tender.create')->with([
            'all_languages' => $all_language,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'slug' => 'required|alpha_dash|unique:tenders',
            'description' => 'required',
            'date' => 'required|date',
            'lang' => 'required',
            // 'status' => 'required',
            'file' => 'required|mimes:pdf,doc,docx,xls,xlsx|max:50000',
        ]);

        $file = $request->file('file');
        $name = sha1(date('YmdHis') . Str::random(30));
        $fileSizeInByte = File::size($file);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            // Store Tender
            if (file_exists($file)) {
                $newFile = $name . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/tender_documents', $file->getClientOriginalName());
            }

            Tender::create([
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'slug' => SlugService::createSlug(Tender::class, 'slug', $request->title),
                'description' => SanitizeInput::kses_basic($request->description),
                'last_date' => $request->date,
                'original_filename' => basename($file->getClientOriginalName()),
                'filename' => $newFile,
                'file_size' => $fileSizeInByte,
                'file_extension' => $file->getClientOriginalExtension(),
                'lang' => $request->lang,
                'status' => $request->status,
            ]);

            return redirect()->back()->with([
                'msg' => __('New Tender Added...'),
                'type' => 'success'
            ]);
        }
    }

    public function edit($id)
    {
        $tender = Tender::find($id);
        $all_language = Language::all();
        return view('backend.pages.tender.edit')->with([
            'tender' => $tender,
            'all_languages' => $all_language,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'lang' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            // Store Tender
            $tender = Tender::find($id);

            $tender->update([
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'description' => SanitizeInput::kses_basic($request->description),
                'last_date' => $request->date,
                'lang' => $request->lang,
                'status' => $request->status,
            ]);

            return redirect()->route('admin.tender')->with([
                'msg' => __('New Tender Updated...'),
                'type' => 'success'
            ]);
        }
    }

    public function destroy($id)
    {
        $tender = Tender::where('id', $id)->firstOrFail();

        if (!$tender) {
            return redirect()->route('admin.tender')->with('error', 'Tender not found.');
        } else {
            $file_path = "/public/tender_documents/" . $tender->original_filename;
            if (Storage::exists($file_path)) {
                Storage::delete($file_path);
            }

            $tender->delete();

            return redirect()->back()->with([
                'msg' => __('Tender Delete Success...'),
                'type' => 'danger'
            ]);
        }
    }

    public function bulk_action(Request $request)
    {
        Tender::whereIn('id', $request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    public function tender_page_settings()
    {
        $all_languages = Language::all();
        return view('backend.pages.tender.page-settings.tender')->with(['all_languages' => $all_languages]);
    }

    public function update_tender_page_settings(Request $request)
    {

        $this->validate($request, [
            'tender_page_recent_post_widget_items' => 'nullable|string|max:191',
            'tender_page_item' => 'nullable|string|max:191'
        ]);

        $all_languages = Language::all();
        foreach ($all_languages as $lang) {
            $this->validate($request, [
                'tender_page_' . $lang->slug . '_read_more_btn_text' => 'nullable|string',
            ]);
            $read_more_btn_text = 'tender_page_' . $lang->slug . '_read_more_btn_text';
            update_static_option($read_more_btn_text, $request->$read_more_btn_text);
        }

        update_static_option('tender_page_item', $request->tender_page_item);
        update_static_option('tender_page_recent_post_widget_items', $request->tender_page_recent_post_widget_items);

        return redirect()->back()->with([
            'msg' => __('Settings Update Success...'),
            'type' => 'success'
        ]);
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Tender::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    // Calculate bytesToHuman format
    public static function bytesToHuman($bytes)
    {
        $units = ['B', 'KB', 'MB', 'GB'];

        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }
}
