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

Route::prefix('timesheet')->group(function() {
    Route::get('/', 'TimesheetController@index');
    Route::get('/browse/{employees_id}/{date}', 'TimesheetController@browse');
    Route::get('/index/{employees_id}/{date}', 'TimesheetController@index');
});
