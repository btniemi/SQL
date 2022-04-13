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
    $people = \App\Models\people::all();
    $movies = \App\Models\movies::all();
    $watched = \App\Models\watched::all();
    return view('data', ['people'=> $people, 'movies'=>$movies, 'watched'=>$watched]);
});

Route::resource('/movies', \App\Http\Controllers\movies::class);
Route::resource('/people', \App\Http\Controllers\people::class);
Route::resource('/watched', \App\Http\Controllers\watched::class);
