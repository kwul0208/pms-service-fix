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

Route::prefix('sprint')->group(function() {
    Route::get('/', 'SprintController@index');
    Route::get('/create', 'SprintController@create');
    Route::get('/{id}', 'SprintController@show');
    Route::get('/sprinttask/{id}/{date}', 'SprinttaskController@index');
});
