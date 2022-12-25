<?php

namespace App\Http\Controllers;

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


// Route::get('/quizlist', 'App\Http\Controllers\HelloController@index');
//HelloController@indexだけじゃエラー起こる

Route::get('/quizlist', function(){
  return view('hello.index');
});

// Route::post('hello', 'App\Http\Controllers\HelloController@post');

Route::get('/quizy/{id?}', 'App\Http\Controllers\QuizyController@index');
