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

Route::get('/', 'ViewController@index');

Route::get('/admin', 'ViewController@admin');

Route::delete('/admin/delete/{id}', 'ViewController@delete');
Route::post('/admin/create-event', 'ViewController@create');

