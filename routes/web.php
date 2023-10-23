<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('front.index');
});



Route::group(['prefix'=>'dash','as'=>'dash.'], function(){
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::get('/users', function () {
        return view('admin.users');
    });
    Route::get('/torneos',[App\Http\Controllers\Admin\TorneosController::class,'index']);
    Route::resource('torneos',App\Http\Controllers\Admin\TorneosController::class);
});