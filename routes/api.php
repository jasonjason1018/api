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

Route::group(['prefix' => 'todo'], function () {
    Route::post('/task', 'TodoController@createTask');
    Route::get('/task', 'TodoController@getTask');
    Route::delete('/task/{id_todolist}', 'TodoController@deleteTask');
    Route::patch('/task/{id_todolist}', 'TodoController@updateTask');
});

