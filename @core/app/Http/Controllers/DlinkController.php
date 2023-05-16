<?php

namespace App\Http\Controllers;

use App\DlCategory;
use App\Dlink;
use App\Language;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class DlinkController extends Controller
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

        //Fetch Documents & Links
        $dlinks = Dlink::orderBy('updated_at', 'DESC')->get();
        return view('backend.pages.dlink.index', compact('dlinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Create Documents & Links
        $dlinks = Dlink::orderBy('updated_at', 'DESC')->get();
        $categories = DlCategory::all();
        return view('backend.pages.dlink.create', compact(['categories', 'dlinks']));
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

            $upload = new Dlink();
            $upload->dlcategory_id = $request->categories;
            $upload->title = $title;
            $upload->original_filename = $originalFile;
            $upload->file_extension = $newFile;
            // $upload->filename = $newFile;
            $upload->file_size = $fileSizeInByte;
            $upload->url = $url;
            $upload->expired_at = Carbon::now()->addDays(10);
            $upload->save();

            $upload->dlcategory()->attach([$request->categories => ['created_at' => now(), 'updated_at' => now()]]);

            return redirect()->back()->with([
                'msg' => __('New Document or Link Added...'),
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
        $dlink = Dlink::find($id);
        $categories = DlCategory::all();
        return view('backend.pages.dlink.edit', compact(['dlink', 'categories']));
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
        $upload = Dlink::find($id);

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

            $upload->dlcategory_id = $request->categories;
            $upload->title = $title;
            $upload->url = $url;
            $upload->expired_at = $update_at->addDays(10);
            $upload->update();

            $upload->dlcategory()->sync([$request->categories => ['updated_at' => now()]]);

            return redirect()->route('admin.dlinks')->with([
                'msg' => __('New Document or Link Updated...'),
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
        $data = Dlink::where('id', $id)->first();

        if (!$data) {
            return redirect()->back()->with('error', 'Document or Link Not Found !!');
        } else {
            $data->dlcategory()->detach();
            Dlink::where('id', $id)->delete();
            $file = "/public/important_documents/" . $data->original_filename;

            if (Storage::exists($file)) {
                Storage::delete($file);
            }
        }

        return redirect()->back()->with([
            'msg' => __('Document or Link Deleted...'),
            'type' => 'success'
        ]);
    }

    public function dlink_page_settings()
    {
        $all_languages = Language::all();
        return view('backend.pages.dlink.page-settings.setting')->with(['all_languages' => $all_languages]);
    }

    public function update_dlink_page_settings(Request $request)
    {
        $all_languages = Language::all();
        foreach ($all_languages as $lang) {
            $this->validate($request, [
                'dlink_section_' . $lang->slug . '_title' => 'nullable|string',
                'dlink_page_' . $lang->slug . '_title' => 'nullable|string',
                'dlink_message_' . $lang->slug . '_text_here' => 'nullable|string',
                'dlink_btn_' . $lang->slug . '_text_here' => 'nullable|string',
            ]);
            $dlink_section_title = 'dlink_section_' . $lang->slug . '_title';
            $dlink_page_title = 'dlink_page_' . $lang->slug . '_title';
            $dlink_page_message = 'dlink_message_' . $lang->slug . '_text_here';
            $show_more_btn_text = 'dlink_btn_' . $lang->slug . '_text_here';
            update_static_option($dlink_section_title, $request->$dlink_section_title);
            update_static_option($dlink_page_title, $request->$dlink_page_title);
            update_static_option($dlink_page_message, $request->$dlink_page_message);
            update_static_option($show_more_btn_text, $request->$show_more_btn_text);
        }

        return redirect()->back()->with([
            'msg' => __('Settings Update Success...'),
            'type' => 'success'
        ]);
    }
}
