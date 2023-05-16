<?php

namespace App\Http\Controllers;

use App\Language;
use App\MonthPhoto;
use Illuminate\Http\Request;

class MonthPhotoController extends Controller
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
        $all_images = MonthPhoto::all()->groupBy('lang');
        $all_languages = Language::all();
        return view('backend.pages.month-photo.photo')->with(['all_images' => $all_images, 'all_languages' => $all_languages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|string',
            'name' => 'required|string',
            'lang' => 'required|string',
        ]);
        MonthPhoto::create([
            'image' => $request->image,
            'name' => $request->name,
            'lang' => $request->lang,
        ]);
        return redirect()->back()->with(['msg' => __('New Image Added...'), 'type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MonthPhoto  $monthPhoto
     * @return \Illuminate\Http\Response
     */
    public function show(MonthPhoto $monthPhoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MonthPhoto  $monthPhoto
     * @return \Illuminate\Http\Response
     */
    public function edit(MonthPhoto $monthPhoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MonthPhoto  $monthPhoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|string',
            'name' => 'required|string',
            'lang' => 'required|string',
        ]);
        MonthPhoto::find($request->id)->update([
            'image' => $request->image,
            'name' => $request->name,
            'lang' => $request->lang,
        ]);
        return redirect()->back()->with(['msg' => __('Image Updated...'), 'type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MonthPhoto  $monthPhoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(MonthPhoto $monthPhoto)
    {
        //
    }

    public function delete(Request $request, $id)
    {
        MonthPhoto::find($id)->delete();
        return redirect()->back()->with(['msg' => __('Image Delete...'), 'type' => 'danger']);
    }

    public function bulk_action(Request $request)
    {
        $all = MonthPhoto::find($request->ids);
        foreach ($all as $item) {
            $item->delete();
        }
        return response()->json(['status' => 'ok']);
    }
}
