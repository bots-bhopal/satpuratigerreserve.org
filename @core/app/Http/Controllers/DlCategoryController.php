<?php

namespace App\Http\Controllers;

use App\DlCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class DlCategoryController extends Controller
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
        $categories = DlCategory::latest()->get();
        return view('backend.pages.dlink.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.dlink.category.create');
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
            'name' => 'required|unique:dlcategory',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.dlcategory.new')->withErrors($validator)->withInput();
        } else {
            $slug = !empty($request->slug) ? $request->slug : Str::slug($request->name, $request->lang);

            $category = new DlCategory();
            $category->name = $request->name;
            $category->slug = $slug;
            $category->save();

            return redirect()->back()->with([
                'msg' => __('New Category Added...'),
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
        $category = DlCategory::find($id);
        return view('backend.pages.dlink.category.edit', compact('category'));
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
        $category = DlCategory::find($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.dlcategory.edit', $category->id)->withErrors($validator)->withInput();
        } else {
            $slug = !empty($request->slug) ? $request->slug : Str::slug($request->name, $request->lang);

            $category->name = $request->name;
            $category->slug = $slug;
            $category->save();

            return redirect()->back()->with([
                'msg' => __('Category Updated...'),
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
        $category = DlCategory::find($id);
        $category->delete();
        return redirect()->back()->with([
            'msg' => __('Category Deleted...'),
            'type' => 'danger'
        ]);
    }
}
