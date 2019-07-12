<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('/board')->group(function(){

    Route::get('/','BoardController@getIndex');
    Route::get('/create','BoardController@getCreate');
    Route::post('/create','BoardController@postCreate');
    Route::get('/detail','BoardController@getEdit');
    Route::post('/edit','BoardController@postEdit');
});
