<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::options('auth/login', 'Auth\AuthController@postLogin');

Route::post('auth/logout', 'Auth\AuthController@logout');
Route::options('auth/logout', 'Auth\AuthController@logout');

Route::get('usuario/empresas', 'User\UserController@getEmpresas');
Route::options('usuario/empresas', 'User\UserController@getEmpresas');

Route::post('inv/disponible', 'Inv\InvController@getArtExistencia');
Route::options('inv/disponible', 'Inv\InvController@getArtExistencia');