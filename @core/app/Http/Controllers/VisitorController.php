<?php

namespace App\Http\Controllers;

use App\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class VisitorController extends Controller
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
        $visitors = Visitor::latest()->get();
        return view('backend.pages.visitor.index', compact('visitors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.visitor.create');
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
            'count' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.visitor.new')->withErrors($validator)->withInput();
        } else {
            $visitor = new Visitor();
            $visitor->visitors_count = $request->count;
            $visitor->save();

            return redirect()->back()->with([
                'msg' => __('New Visitor Count Added...'),
                'type' => 'success'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function show(Visitor $visitor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visitor = Visitor::find($id);
        return view('backend.pages.visitor.edit', compact('visitor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $visitor = Visitor::find($id);

        $validator = Validator::make($request->all(), [
            'count' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.visitor.edit', $visitor->id)->withErrors($validator)->withInput();
        } else {
            $visitor->visitors_count = $request->count ? $request->count + $request->totalcount : '0';
            $visitor->save();

            return redirect()->route('admin.visitor')->with([
                'msg' => __('Visitor Counter Updated...'),
                'type' => 'success'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $visitor = Visitor::find($id);
        // $visitor->delete();
        // return redirect()->back()->with([
        //     'msg' => __('Visitors Deleted...'),
        //     'type' => 'danger'
        // ]);
    }
}
