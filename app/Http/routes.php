<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
    // return view('welcome');
// });

Route::get('/', 'IndexController@index');
Route::get('/index', 'IndexController@index');
// add task
Route::post('/add', 'IndexController@add');
// del task
Route::get('/del', 'IndexController@del');
// edit task
Route::post('/edit', 'IndexController@edit');
// finish task
Route::post('/doFinish', 'IndexController@doFinish');
