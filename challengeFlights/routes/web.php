<?php

use App\Http\Controllers\AirlineController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\FlightController;
use Illuminate\Support\Facades\Route;

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

Route::get('airlines', [AirlineController::class, 'index']);
Route::post('create-airline', [AirlineController::class, 'store']);
Route::delete('delete-airline/{airline}', [AirlineController::class, 'destroy']);
Route::get('edit-airline/{airline}', [AirlineController::class, 'edit']);
Route::patch('update-airline/{airline}', [AirlineController::class, 'update']);
Route::get('fetch-airline', [AirlineController::class , 'fetch']);

Route::get('cities', [CityController::class, 'index']);
Route::post('create-city', [CityController::class, 'store']);
Route::delete('delete-city/{city}', [CityController::class, 'destroy']);
Route::get('edit-city/{city}', [CityController::class, 'edit']);
Route::patch('update-city/{city}', [CityController::class, 'update']);
Route::get('fetch-city', [CityController::class, 'fetch']);
//Route::get('create-airline',[AirlineController::class, 'create']);

Route::get('flights', [FlightController::class, 'index']);
Route::get('fetch-flight', [FlightController::class, 'fetch']);
Route::delete('delete-flight/{flight}', [FlightController::class, 'destroy']);
Route::post('create-flight', [FlightController::class, 'store']);
Route::patch('update-flight/{flight}', [FlightController::class, 'update']);

Route::get('/', function () {
    return view('home');
});
