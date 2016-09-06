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

Route::get( '/', function () { return view( 'welcome' ); } );


Route::get( 'about', 'PagesController@about' );
Route::get( 'contact', 'PagesController@contact' );


// ROTAS DOS ARTIGOS
Route::resource( 'articles', 'ArticlesController' );
// > artisan route:list
//  GET|HEAD  | articles                | articles.index   | ArticlesController@index
//  POST      | articles                | articles.store   | ArticlesController@store
//  GET|HEAD  | articles/create         | articles.create  | ArticlesController@create
//  GET|HEAD  | articles/{article}      | articles.show    | ArticlesController@show
//  PUT|PATCH | articles/{article}      | articles.update  | ArticlesController@update
//  DELETE    | articles/{article}      | articles.destroy | ArticlesController@destroy
//  GET|HEAD  | articles/{article}/edit | articles.edit    | ArticlesController@edit

//Route::get( 'articles', 'ArticlesController@index' );
//Route::get( 'articles/create', 'ArticlesController@create' );
//Route::get( 'articles/{id}', 'ArticlesController@show' );
//Route::get( 'articles/{id}/edit', 'ArticlesController@edit' );
//Route::post( 'articles', 'ArticlesController@store' );




Auth::routes();

Route::get('/home', 'HomeController@index');
