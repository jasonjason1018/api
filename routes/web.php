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

Route::view('/', 'login');
Route::group(['middleware' => 'token'], function () {
    Route::view('/dashboard', 'dashboard');
    Route::view('/todo', 'todolist.todolist');
});
