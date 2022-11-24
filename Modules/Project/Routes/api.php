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

// Route::middleware('auth:api')->get('/project', function (Request $request) {
//     return $request->user();
// });

Route::prefix('project')->group(function() {
    Route::post('/', 'Api\ProjectController@index');

    Route::post('/all', 'Api\ProjectController@all');

    Route::get('/{user_id}', 'Api\ProjectController@index');
    Route::post('/tasks-not-started', 'Api\TaskProjectController@tasksNotStarted');
    Route::post('/tasks-ongoing', 'Api\TaskProjectController@tasksOnGoing');
    Route::post('/tasks-done', 'Api\TaskProjectController@tasksDone');
    
    // belum
    Route::get('/{id}', 'Api\ProjectController@show');
    Route::get('/create', 'Api\ProjectController@create');
    Route::post('/store', 'Api\ProjectController@store');
    Route::post('/taskProject/store', 'TaskProjectController@store');

    Route::get('/delete/{id}', 'Api\ProjectController@destroy');
    Route::get('/meeting/{id}', 'MeetingController@index');
});