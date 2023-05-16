<?php

namespace App\Http\Controllers;

use App\AbCategory;
use App\Aboard;
use App\Language;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class AboardController extends Controller
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
        //Fetch All Announcement Board Data
        $announcements = Aboard::orderBy('updated_at', 'DESC')->get();
        return view('backend.pages.aboard.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Create Announcement Board Data
        $data = Aboard::orderBy('updated_at', 'DESC')->get();
        $categories = AbCategory::all();
        return view('backend.pages.aboard.create', compact(['categories', 'data']));
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

            $upload = new Aboard();
            $upload->abcategory_id = $request->categories;
            $upload->title = $title;
            $upload->original_filename = $originalFile;
            $upload->file_extension = $newFile;
            // $upload->filename = $newFile;
            $upload->file_size = $fileSizeInByte;
            $upload->url = $url;
            $upload->expired_at = Carbon::now()->addDays(10);
            $upload->save();

            $upload->AbCategory()->attach([$request->categories => ['created_at' => now(), 'updated_at' => now()]]);

            return redirect()->back()->with([
                'msg' => __('New Data Added...'),
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
        $data = Aboard::find($id);
        $categories = AbCategory::all();
        return view('backend.pages.aboard.edit', compact(['data', 'categories']));
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
        // Update Announcement Board Data
        $upload = Aboard::find($id);

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

            $upload->abcategory_id = $request->categories;
            $upload->title = $title;
            $upload->url = $url;
            $upload->expired_at = $update_at->addDays(10);
            $upload->update();

            $upload->AbCategory()->sync([$request->categories => ['updated_at' => now()]]);

            return redirect()->route('admin.aboard')->with([
                'msg' => __('New Data Updated...'),
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
        $data = Aboard::where('id', $id)->first();

        if (!$data) {
            return redirect()->back()->with('error', 'No Data Found !!');
        } else {
            $data->AbCategory()->detach();
            Aboard::where('id', $id)->delete();
            $file = "/public/important_documents/" . $data->original_filename;

            if (Storage::exists($file)) {
                Storage::delete($file);
            }
        }

        return redirect()->back()->with([
            'msg' => __('Data Deleted...'),
            'type' => 'success'
        ]);
    }

    public function aboard_page_settings()
    {
        $all_languages = Language::all();
        return view('backend.pages.aboard.page-settings.setting')->with(['all_languages' => $all_languages]);
    }

    public function update_aboard_page_settings(Request $request)
    {
        $all_languages = Language::all();
        foreach ($all_languages as $lang) {
            $this->validate($request, [
                'aboard_page_' . $lang->slug . '_title' => 'nullable|string',
                'aboard_message_' . $lang->slug . '_text_here' => 'nullable|string',
                'aboard_btn_' . $lang->slug . '_text_here' => 'nullable|string',
            ]);
            $aboard_page_title = 'aboard_page_' . $lang->slug . '_title';
            $aboard_page_message = 'aboard_message_' . $lang->slug . '_text_here';
            $show_more_btn_text = 'aboard_btn_' . $lang->slug . '_text_here';
            update_static_option($aboard_page_title, $request->$aboard_page_title);
            update_static_option($aboard_page_message, $request->$aboard_page_message);
            update_static_option($show_more_btn_text, $request->$show_more_btn_text);
        }

        return redirect()->back()->with([
            'msg' => __('Settings Update Success...'),
            'type' => 'success'
        ]);
    }
}
