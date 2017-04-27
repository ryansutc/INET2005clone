<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Page;
use App\Article;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = \App\Page::first();
        return view('home', compact('page'));
    }

    /*
     * Run when the user selects a specific page
     */
    public function page(Page $page) {

        //dd($page);
        //store page im session variable in case authoer wants to edit page and we
        //need a reference of where to send them back to.
        session(['authorfrontendid' => $page->id]);
        return view('home', compact('page'));
    }


    /*
     * Open the backend CMS Config page
     */
    public function config()
    {
        //need to have something to verify login user credentials
        foreach( Auth::user()->roles()->orderBy('role_desc')->get() as $role) {
            if ($role->role_desc == 'Admin' || $role->role_desc == 'Edit' ) {
                return view('config');
            }
        };
        return view('noaccess');
    }

    public function story(Article $article){
        //dd($article);
        return view('story', compact('article'));

    }

    public function ajax(Article $article)
    {
        $preview = substr($article->art_text, 0, 500) . "...";
        return view('ajax', compact('article', 'preview'));
    }

}
