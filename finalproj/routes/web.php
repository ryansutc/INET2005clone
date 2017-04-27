<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home/{page}', 'HomeController@page');
//Route::get('/home/home/{page}', 'HomeController@page');

Route::get('/home', 'HomeController@index');

Route::get('/ajax/{article}', 'HomeController@ajax');

Route::get('config', 'HomeController@config');

Route::get('story/{article}', 'HomeController@story');

Route::get('pages', 'PageController@index')->middleware('editor');

Route::get('pages/{page}/edit', 'PageController@edit')->middleware('editor');

Route::patch('pages/{page}', 'PageController@update')->middleware('editor');

Route::get('pages/create', 'PageController@create')->middleware('editor'); //launch add new page page

Route::post('pages/', 'PageController@store')->middleware('editor'); //process submit on new page

Route::delete('pages/{page}', 'PageController@destroy')->middleware('editor'); //delete a record


Route::get('csssheets', 'CssController@index')->middleware('editor');

Route::get('csssheets/{csssheet}/edit', 'CssController@edit')->middleware('editor');

Route::patch('csssheets/{csssheet}', 'CssController@update')->middleware('editor');

Route::get('csssheets/create', 'CssController@create')->middleware('editor'); //launch add new page page

Route::post('csssheets/', 'CssController@store')->middleware('editor'); //process submit on new page

Route::delete('csssheets/{csssheet}', 'CssController@destroy')->middleware('editor'); //delete a record

Route::post('csssheets/updatecss/{id}', 'CssController@updatecss');

Route::get('users', 'UserController@index')->middleware('admin');

Route::get('users/{user}/edit', 'UserController@edit')->middleware('admin');

Route::patch('users/{user}', 'UserController@update')->middleware('admin');

Route::get('users/create', 'UserController@create')->middleware('admin'); //launch add new page page

Route::post('users/', 'UserController@store'); //process submit on new page

//https://laracasts.com/discuss/channels/laravel/user-admin-authentication
Route::delete('users/{user}', 'UserController@destroy'); //delete a record



Route::get('articles', 'ArticleController@index')->middleware('authororeditor');

Route::get('articles/{article}/edit', 'ArticleController@edit')->middleware('authororeditor');

Route::patch('articles/{article}', 'ArticleController@update')->middleware('authororeditor');

Route::get('articles/create', 'ArticleController@create')->middleware('authororeditor'); //launch add new page page

Route::post('articles/', 'ArticleController@store')->middleware('authororeditor'); //process submit on new page

Route::delete('articles/{article}', 'ArticleController@destroy')->middleware('editor'); //delete a record



Route::get('content_areas', 'ContentAreaController@index')->middleware('editor');

Route::get('content_areas/{content_area}/edit', 'ContentAreaController@edit')->middleware('editor');

Route::patch('content_areas/{content_area}', 'ContentAreaController@update')->middleware('editor');

Route::get('content_areas/create', 'ContentAreaController@create')->middleware('editor'); //launch add new page page

Route::post('content_areas/', 'ContentAreaController@store')->middleware('editor'); //process submit on new page

Route::delete('content_areas/{content_area}', 'ContentAreaController@destroy')->middleware('editor'); //delete a record


Route::get('noaccess', function () {
    return view('noaccess');
});


/*
Route::get('/users/edit', function () {
    return view('users.createoredit');
});
*/


