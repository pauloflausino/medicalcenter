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
Auth::routes();

Route::get('/', 'MainController@control');

Route::get('/entrar', 'UserController@login');
Route::get('/cadastrar', 'UserController@register');
Route::get('/home', 'MainController@control');

Route::resource('/pacientes', 'PatientsController');
Route::resource('/medicos', 'DoctorsController');
Route::resource('/consultas', 'AppointmentsController');
