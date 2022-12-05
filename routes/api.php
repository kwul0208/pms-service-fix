<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user/auth/{id}', function(Request $request, $id){
    $employees = array(
        105 => 'Mahrizal',
        298 => 'Agus Susanto',
        484 => 'Danti Iswandhari',       
        500 =>  'Nafsirudin',
        526 => 'Wahyu Nur Cahyo',
        575 => 'Ahmad Wahyu Awaludin'
     );

     $employees_id_array = array(
        105,
        298,
        484,    
        500,
        526,
        575
     );

     if(!in_array($id, $employees_id_array))
     {
        return response([
            'status' => 401,
            'message' => "Sorry Bro, ente bukan termasuk tim Programmer"
        ]);
     }else{
        return response([
            'status' => 200,
            'message' => 'success',
            'data' => [
                $employees[$id],
                $id
            ]
        ]);
     }
    
});
