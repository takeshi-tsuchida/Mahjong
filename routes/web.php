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
Route::prefix('/set')->group(function(){

    Route::get('/','SetController@getIndex');
    Route::get('/create','')
    
    //セット募集掲示板
    Route::prefix('/events')->group(function(){
        Route::get('/','EventsController@getIndex');
        Route::get('/create','EventsController@getCreate');
        Route::post('/create','EventsController@postCreate');
        Route::get('/edit','EventController@getEdit');
        Route::post('/edit','EventController@postEdit');
    });
});
