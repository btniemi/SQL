<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/data', function(){
    $person = \App\Models\Person::all();
    $movie = \App\Models\Movie::all();
    $watched = \App\Models\Watch::all();
    return view('data', ['person'=> $person, 'movie'=>$movie, 'watched'=>$watched]);
});

Route::resource('/movie',\App\Http\Controllers\MovieController::class);
Route::resource('/person',\App\Http\Controllers\PersonController::class);
Route::resource('/watch',\App\Http\Controllers\WatchController::class);
