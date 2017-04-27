<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('editor');
    }

    public function index()
    {
        //open the main pages config page. Needs to chek for editor rights
        $recordCount = 20; //amount of records to show on one page
        $filterQuery = ""; //the search cursor
        $sortField = 'id'; //pick your field to sort on
        $sortType = 'ASC'; //sort ASC / DESC
        return view('pages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
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
            'page_name' => ' required',
            'page_alias' => 'required',
            'page_desc' => 'required',

        ]);
        $page = new Page($request->all());
        $page->created_by = Auth::id();
        //$page->updated_by = auth::id();
        $page->save(); //does this work
        $request->session()->flash('crud','New Record has been added');
        return view('pages.index');
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
    public function edit(Page $page)
    {
        return view('pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        //need a step here to autopopulate the updated_by with the current user
        //$page->updated_by(Auth::id);
        $this->validate($request, [
            'page_name' => ' required',
            'page_alias' => 'required',
            'page_desc' => 'required',

        ]);
        $page->updated_by = Auth::id();
        $page->update($request->all()); //some validation should go here.
        $request->session()->flash('crud', 'Record has been updated'); //flash the session
        //return view('pages.index'); //back returns to prev page
        return redirect()->action('PageController@index');
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
        $page = \App\Page::find($request->id);
        $page->delete();
        $request->session()->flash('crud', '1 Record has been deleted');

        return back();
    }
}
