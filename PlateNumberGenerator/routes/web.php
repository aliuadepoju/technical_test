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

Route::View('/',  'login-page');

Route::Resource('plate-numbers','PlateNumbersController');
Auth::routes();

Route::get('/all-plates', 'HomeController@index');
