<?php

namespace App\Http\Controllers;

use App\Language;
use App\NtCategory;
use App\Ntender;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class NtenderController extends Controller
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

        //Fetch Notice & Tenders
        $ntenders = Ntender::orderBy('updated_at', 'DESC')->get();
        return view('backend.pages.ntender.index', compact('ntenders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Create Notice & Tenders
        $ntenders = Ntender::orderBy('updated_at', 'DESC')->get();
        $categories = NtCategory::all();
        return view('backend.pages.ntender.create', compact(['categories', 'ntenders']));
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
            'file' => 'mimes:pdf,doc,docx,xls,xlsx|max:50000',
            // 'categories' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $title = $request->title;
            $url = $request->customurl;
            $file = $request->file('file');
            // $name = sha1(date('YmdHis') . Str::random(30));
            $fileSizeInByte = File::size($file);

            // Store File
            if (file_exists($file)) {
                $originalFile = basename($file->getClientOriginalName());
                $newFile = $file->getClientOriginalExtension();
                $file->storeAs('public/important_documents', $file->getClientOriginalName());
            } else {
                $originalFile = '';
                $newFile = '';
            }

            $upload = new Ntender();
            $upload->ntcategory_id = $request->categories;
            $upload->title = $title;
            $upload->original_filename = $originalFile;
            $upload->file_extension = $newFile;
            // $upload->filename = $newFile;
            $upload->file_size = $fileSizeInByte;
            $upload->url = $url;
            $upload->expired_at = Carbon::now()->addDays(10);
            $upload->save();

            $upload->ntcategory()->attach([$request->categories => ['created_at' => now(), 'updated_at' => now()]]);

            return redirect()->back()->with([
                'msg' => __('New Notice or Tender Added...'),
                'type' => 'success'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ntender = Ntender::find($id);
        $categories = NtCategory::all();
        return view('backend.pages.ntender.edit', compact(['ntender', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Update File
        $upload = Ntender::find($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'file' => 'mimes:pdf,doc,docx,xls,xlsx|max:50000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $title = $request->title;
            $url = $request->customurl;
            $update_at = $upload->updated_at;

            $upload->ntcategory_id = $request->categories;
            $upload->title = $title;
            $upload->url = $url;
            $upload->expired_at = $update_at->addDays(10);
            $upload->update();

            $upload->ntcategory()->sync([$request->categories => ['updated_at' => now()]]);

            return redirect()->route('admin.ntenders')->with([
                'msg' => __('New Notice or Tender Updated...'),
                'type' => 'success'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Ntender::where('id', $id)->first();

        if (!$data) {
            return redirect()->back()->with('error', 'Notice or Tender Not Found !!');
        } else {
            $data->ntcategory()->detach();
            Ntender::where('id', $id)->delete();
            $file = "/public/important_documents/" . $data->original_filename;

            if (Storage::exists($file)) {
                Storage::delete($file);
            }
        }

        return redirect()->back()->with([
            'msg' => __('Notice or Tender Deleted...'),
            'type' => 'success'
        ]);
    }

    public function ntender_page_settings()
    {
        $all_languages = Language::all();
        return view('backend.pages.ntender.page-settings.setting')->with(['all_languages' => $all_languages]);
    }

    public function update_ntender_page_settings(Request $request)
    {
        $all_languages = Language::all();
        foreach ($all_languages as $lang) {
            $this->validate($request, [
                'ntender_page_' . $lang->slug . '_title' => 'nullable|string',
                'ntender_message_' . $lang->slug . '_text_here' => 'nullable|string',
                'ntender_btn_' . $lang->slug . '_text_here' => 'nullable|string',
            ]);
            $ntender_page_title = 'ntender_page_' . $lang->slug . '_title';
            $ntender_page_message = 'ntender_message_' . $lang->slug . '_text_here';
            $show_more_btn_text = 'ntender_btn_' . $lang->slug . '_text_here';
            update_static_option($ntender_page_title, $request->$ntender_page_title);
            update_static_option($ntender_page_message, $request->$ntender_page_message);
            update_static_option($show_more_btn_text, $request->$show_more_btn_text);
        }

        return redirect()->back()->with([
            'msg' => __('Settings Update Success...'),
            'type' => 'success'
        ]);
    }
}
