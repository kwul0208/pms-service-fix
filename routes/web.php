<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    $page = '/';
    return view('home', compact('page'));
});

Route::get('/user/auth/{id}', function(Request $request, $id){
	

    $employees = array(
        105 => 'Mahrizal',
        298 => 'Agus Susanto',
        484 => 'Danti Iswandhari',       
        500 =>  'Nafsirudin',
        526 => 'Wahyu Nur Cahyo'
     );

     $employees_id_array = array(
        105,
        298,
        484,    
        500,
        526,
     );
//filter
     if(!in_array($id, $employees_id_array))
     {
        exit('<h3 align="center">Sorry Bro, ente bukan termasuk tim Programmer</h3>');
     }
    $request->session()->put('employeesId', $id);

  
     $fullname = $employees[$id];
     $request->session()->put('employeesFullname', $fullname);
	return redirect('/task/mytask/index/todo');
});

