<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('isAdmin');
    }

    public function index()
    {
        //open the main users config page. Needs to chek for editor rights
        $recordCount = 20; //amount of records to show on one page
        $filterQuery = ""; //the search cursor
        $sortField = 'id'; //pick your field to sort on
        $sortType = 'ASC'; //sort ASC / DESC
        return view('users.index');
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
            'name' => ' required|unique:users|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        //MODIFIED RS

        $user = new User([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        //$user->created_by = Auth::id();
        $user->save(); //does this work

        //Update Admin
        if ($request->admin){
            $newRole = \DB::Table('role_user')->insertGetId(
                ['user_id' => $user->id, 'role_id' => 1]);
        }
        //update Editor
        if ($request->editor){
                $newRole = \DB::Table('role_user')->insertGetId(
                    ['user_id' => $user->id, 'role_id' => 2]);
        }
        //update Author
        if ($request->author){
            $newRole = \DB::Table('role_user')->insertGetId(
                ['user_id' => $user->id, 'role_id' => 3]);
        }

        $request->session()->flash('crud','New Record has been added');
        return view('users.index');
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
    public function edit(User $user)
    {
        //$user = \App\User::find(1);
        return view('users.edit', compact('user'));
        //return view('users.createoredit', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Load user/createOrUpdate.blade.php view
        return view('users.create');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, User $user)
    {
        //need a step here to autopopulate the updated_by with the current user
        //$user->updated_by(Auth::id);
        $this->validate($request, [
            'name' => ' required|min:4',
        ]);

        //first clear all roles
        \DB::table('role_user')->where(
            'user_id', '=', $user->id)->delete();

        //then repopulate based on checkboxes
        //Update Admin
        if ($request->admin){
            if (!$user->isAdmin()){
                $newRole = \DB::Table('role_user')->insertGetId(
                    ['user_id' => $user->id, 'role_id' => 1]);
            }
        }
        //update Editor
        if ($request->editor){
            if (!$user->isEditor()){
                $newRole = \DB::Table('role_user')->insertGetId(
                    ['user_id' => $user->id, 'role_id' => 2]);
            }
        }
        //update Author
        if ($request->author){
            if (!$user->isAuthor()){
                $newRole = \DB::Table('role_user')->insertGetId(
                    ['user_id' => $user->id, 'role_id' => 3]);
            }
        }

        $user->update($request->all()); //some validation should go here.
        $request->session()->flash('crud', 'Record has been updated'); //flash the session

        //return view('users.index'); //back returns to prev user
        return redirect()->action('UserController@index');
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
        $user = \App\User::find($request->id);
        $user->delete();
        $request->session()->flash('crud', '1 Record has been deleted');

        return back();
    }
}
