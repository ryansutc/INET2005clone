<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContentArea;
use Illuminate\Support\Facades\Auth;

class ContentAreaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //open the main pages config page. Needs to chek for editor rights

        return view('content_areas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content_areas.create');
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
            'cont_name' => ' required',
            'cont_alias' => 'required',
            'cont_desc' => 'required',
            'disp_order' => 'numeric',

        ]);
        $content_area = new ContentArea($request->all());
        $content_area->created_by = Auth::id();
        //$content_area->updated_by = auth::id();
        $content_area->save(); //does this work
        $request->session()->flash('crud','New Record has been added');
        return view('content_areas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ContentArea $content_area)
    {
        return view('content_areas.edit', compact('content_area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContentArea $content_area)
    {
        //need a step here to autopopulate the updated_by with the current user
        //$content_area->updated_by(Auth::id);
        $this->validate($request, [
            'cont_name' => ' required',
            'cont_alias' => 'required',
            'cont_desc' => 'required',
            'disp_order' => 'numeric',

        ]);
        $content_area->updated_by = Auth::id();
        $content_area->update($request->all()); //some validation should go here.
        $request->session()->flash('crud', 'Record has been updated'); //flash the session
        //return view('pages.index'); //back returns to prev page
        return redirect()->action('ContentAreaController@index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //when we want to delete a record
        $content_area = \App\ContentArea::find($request->id);
        $content_area->delete();
        $request->session()->flash('crud', '1 Record has been deleted');

        return back();
    }
}
