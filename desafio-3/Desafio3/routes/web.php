<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'UserController@index');
Route::get('/create-user', 'UserController@templateCreate');
Route::get('/visualizar-user/{id}', 'UserController@show');
Route::post('/atualizar-user/{id}', 'UserController@atualizarUsuario');
Route::post('/create-user', 'UserController@create');
Route::post('/deletar-user', 'UserController@deletar');