<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use Illuminate\Support\Facades\Auth;
use App\Article;
use Illuminate\Support\Facades\Session;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //A special shim to take authors back to front end
        //instead of letting them get to the index
        if(Auth::check() && Auth::user()->isAuthor()){
            if(!Auth::user()->isAdmin() && !Auth::user()->isEditor()) {
                $value = session('authorfrontendid');
                session()->flash('crud', 'Article has been updated.');
                if (!$value) {

                    return redirect('home/' . 1);
                } else {
                    return redirect('home/' . $value); // a little trick to take ya back home
                }
            }
        }

        return view('articles.index');
    }

    public function create()
    {
        return view('articles.create');
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
            'art_name' => 'required|max:45',
            'art_title' => 'required|max:45',
            'art_text' => 'required',

        ]);
        $article = new Article($request->all());
        $article->created_by = Auth::id();
        $article->save(); //does this work
        $request->session()->flash('crud','New Record has been added');
        return view('articles.index');
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
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //need a step here to autopopulate the updated_by with the current user
        //$article->updated_by(Auth::id);
        $this->validate($request, [
            'art_name' => ' required',
            'art_title' => 'required',
            'art_desc' => 'required',

        ]);
        $article->updated_by = Auth::id();
        $article->update($request->all()); //some validation should go here.
        $request->session()->flash('crud', 'Record has been updated'); //flash the session
        //return view('articles.index'); //back returns to prev article
        return redirect()->action('ArticleController@index');
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
        $article = \App\Article::find($request->id);
        $article->delete();
        $request->session()->flash('crud', '1 Record has been deleted');

        return back();
    }
}
