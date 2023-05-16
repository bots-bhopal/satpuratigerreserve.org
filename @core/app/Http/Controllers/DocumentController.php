<?php

namespace App\Http\Controllers;

use App\Document;
use App\Helpers\SanitizeInput;
use App\Language;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents =  Document::orderBy('id', 'DESC')->get();
        return view('backend.pages.document.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_language = Language::all();
        return view('backend.pages.document.create')->with([
            'all_languages' => $all_language,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'slug' => 'required|alpha_dash|unique:documents',
            'description' => 'required',
            'lang' => 'required',
            'file' => 'required|mimes:pdf,doc,docx,xls,xlsx|max:50000',
        ]);

        $file = $request->file('file');
        $name = sha1(date('YmdHis') . Str::random(30));
        $fileSizeInByte = File::size($file);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            // Store Document
            if (file_exists($file)) {
                $newFile = $name . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/other_documents', $file->getClientOriginalName());
            }

            Document::create([
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'slug' => SlugService::createSlug(Document::class, 'slug', $request->title),
                'description' => SanitizeInput::kses_basic($request->description),
                'original_filename' => basename($file->getClientOriginalName()),
                'filename' => $newFile,
                'file_size' => $fileSizeInByte,
                'file_extension' => $file->getClientOriginalExtension(),
                'lang' => $request->lang,
                'status' => $request->status,
            ]);

            return redirect()->back()->with([
                'msg' => __('New Document Added...'),
                'type' => 'success'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DocumentController  $documentController
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DocumentController  $documentController
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $document = Document::find($id);
        $all_language = Language::all();
        return view('backend.pages.document.edit')->with([
            'document' => $document,
            'all_languages' => $all_language,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DocumentController  $documentController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'lang' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            // Update Document
            $document = Document::find($id);

            $document->update([
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'description' => SanitizeInput::kses_basic($request->description),
                'lang' => $request->lang,
                'status' => $request->status,
            ]);

            return redirect()->route('admin.document')->with([
                'msg' => __('New Document Updated...'),
                'type' => 'success'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DocumentController  $documentController
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = Document::where('id', $id)->firstOrFail();

        if (!$document) {
            return redirect()->route('admin.document')->with('error', 'Document not found.');
        } else {
            $file_path = "/public/other_documents/" . $document->original_filename;
            if (Storage::exists($file_path)) {
                Storage::delete($file_path);
            }

            $document->delete();

            return redirect()->back()->with([
                'msg' => __('Document Delete Success...'),
                'type' => 'danger'
            ]);
        }
    }

    public function bulk_action(Request $request)
    {
        Document::whereIn('id', $request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    public function document_page_settings()
    {
        $all_languages = Language::all();
        return view('backend.pages.document.page-settings.document')->with(['all_languages' => $all_languages]);
    }

    public function update_document_page_settings(Request $request)
    {

        $this->validate($request, [
            'document_page_recent_post_widget_items' => 'nullable|string|max:191',
            'document_page_item' => 'nullable|string|max:191'
        ]);

        $all_languages = Language::all();
        foreach ($all_languages as $lang) {
            $this->validate($request, [
                'document_page_' . $lang->slug . '_read_more_btn_text' => 'nullable|string',
            ]);
            $read_more_btn_text = 'document_page_' . $lang->slug . '_read_more_btn_text';
            update_static_option($read_more_btn_text, $request->$read_more_btn_text);
        }

        update_static_option('document_page_item', $request->document_page_item);
        update_static_option('document_page_recent_post_widget_items', $request->document_page_recent_post_widget_items);

        return redirect()->back()->with([
            'msg' => __('Settings Update Success...'),
            'type' => 'success'
        ]);
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Document::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
