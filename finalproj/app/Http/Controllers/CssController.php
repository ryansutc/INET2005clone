<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Csssheet;
//use Illuminate\Support\Facades\Auth;
use App\User;
use Auth;

class CssController extends Controller
{
    //CSS
    public function validateCreds(){
        //need to have something to verify login user credentials cant seem to put this in constructor
        $good = false;
        if(Auth::check()) {
            foreach (\App\User::find(Auth::user()->id)->roles()->orderBy('role_desc')->get() as $role) {
                if ($role->role_desc == 'Editor') {
                    $good = true;
                }
            };
            if ($good == false){
                return view('noaccess');
            }
        }
    }

    public function __construct()
    {
        $this->middleware('auth');

    }


    public function index()
    {

        return view('csssheets.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('csssheets.create');
    }

    /**
     * StMoore a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'css_name' => ' required',
            'css_desc' => 'required',

        ]);
        //$csssheet = \App\Csssheet::find($request->id);

        $csssheet = new Csssheet($request->all());
        if($csssheet->css_state == 1){
            $csssheet->active($request->id);
        }
        $csssheet->created_by = Auth::id();
        $csssheet->save(); //does this work
        $request->session()->flash('crud','New Record has been added');
        return view('csssheets.index');
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
    public function edit(Csssheet $csssheet)
    {

        return view('csssheets.edit', compact('csssheet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Csssheet $csssheet)
    {
        //need a step here to autopopulate the updated_by with the current user
        //$page->updated_by(Auth::id);

        $this->validate($request, [
            'css_name' => ' required',
            'css_desc' => 'required',
        ]);
        if ($request->css_state == 1)
        {
            $csssheet->active($csssheet->id);
        }
        $csssheet->update($request->all()); //some validation should go here.
        $request->session()->flash('crud', 'Record has been updated'); //flash the session
        //return view('csssheets.index'); //back returns to prev page (keeps wrong url)
        //return redirect()->action('PageController@index');

        return redirect()->action('CssController@index');
    }

    public function updatecss($id) {
        foreach (\App\Csssheet::all() as $csssheet) {
            if($csssheet->id == $id) {
                $csssheet->css_state = 1;
                $csssheet->save();
            } elseif($csssheet->css_state == 1){
                $csssheet->css_state = 0;
                $csssheet->save();
            }
        }
        return null; //what will this do?
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
        $csssheet = \App\Csssheet::find($request->id);
        $csssheet->delete();
        $request->session()->flash('crud', '1 Record has been deleted');

        return back();
    }
}
