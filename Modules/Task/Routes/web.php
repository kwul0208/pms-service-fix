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

Route::prefix('task')->group(function() {
    Route::get('/', 'TaskController@index');
    Route::get('/index/{status}', 'TaskController@index');
    Route::get('/index/{status}/{employeesId}', 'TaskController@index');
    Route::post('/store', 'TaskController@store');
    Route::get('/mytask/index/{status}', 'MyTaskController@index');
    Route::post('/mytask/ajaxCreate', 'MyTaskController@ajaxCreate');
    Route::get('/mytask/index/{status}', 'MyTaskController@index');
    Route::get('/{id}', 'TaskController@show');
    
});
