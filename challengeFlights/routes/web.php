<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AirlineController;
use \App\Http\Controllers\CityController;


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

Route::get('/',[AirlineController::class, 'index']);
Route::get('airlines',[AirlineController::class, 'index']);
Route::post('create-airline',[AirlineController::class, 'store']);
Route::delete('delete-airline/{airline}',[AirlineController::class, 'destroy']);

Route::get('cities',[CityController::class, 'index']);
Route::post('create-city',[CityController::class, 'store']);
Route::delete('delete-city/{city}',[CityController::class, 'destroy']);
//Route::get('create-airline',[AirlineController::class, 'create']);

//Route::get('/', function () {
//    return view('layout');
//});

