<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Server\Http\Controllers\ServerController;

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

Route::prefix('server')->group(function() {
    Route::get('/', [ServerController::class, 'index']);
    Route::post('/store', [ServerController::class, 'store']);
    Route::get('/detail/{id}', [ServerController::class, 'show']);
    Route::post('/delete', [ServerController::class, 'destroy']);
    Route::post('/update', [ServerController::class, 'update']);
});