<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('task')->group(function() {
    Route::post('/mytask/index/{status}', 'Api\MyTaskController@index');
    Route::post('/store', 'Api\TaskController@store');
    Route::post('/update/{task_id}', 'Api\TaskController@update');
    Route::post('/quickUpdate/{task_id}', 'Api\TaskController@quickUpdate');
    Route::post('/statusUpdate/{task_id}', 'Api\TaskController@statusUpdate');
    Route::delete('/delete/{task_id}', 'Api\TaskController@destroy');
    Route::get('/{id}', 'Api\TaskController@show');
    Route::get('/task-doing/{task_id}/{emp_id}', 'Api\MyTaskController@getTaskDoing');
    Route::post('/task-doing/store', 'Api\MyTaskController@storeTaskDoing');
    
    // belum
    Route::get('/', 'TaskController@index');
    Route::get('/index/{status}', 'TaskController@index');
    Route::post('/mytask/ajaxCreate', 'Api\MyTaskController@ajaxCreate');
    Route::get('/mytask/index/{status}', 'Api\MyTaskController@index');
    
});