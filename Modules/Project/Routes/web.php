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

Route::prefix('project')->group(function() {
    Route::get('/', 'ProjectController@index');
    Route::get('/create', 'ProjectController@create');
    Route::get('/{id}', 'ProjectController@show');
    Route::post('/store', 'ProjectController@store');
    Route::get('/task/{id}', 'TaskProjectController@index');
    Route::post('/taskProject/store', 'TaskProjectController@store');

    Route::get('/delete/{id}', 'ProjectController@destroy');
    Route::get('/meeting/{id}', 'MeetingController@index');
});
