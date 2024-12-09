<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');
    Route::post('register', 'App\Http\Controllers\AuthController@register');


});

Route::group([

    'middleware' => 'api',

], function ($router) {

    Route::get('tareas', 'App\Http\Controllers\TareasController@index');
    Route::post('tareas', 'App\Http\Controllers\TareasController@store');
    Route::put('tareas/{id}', 'App\Http\Controllers\TareasController@update');
    Route::delete('tareas/{id}', 'App\Http\Controllers\TareasController@destroy');

});
