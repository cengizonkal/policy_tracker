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

Route::get('/', 'Dashboard@index');
Route::get('/home', 'Dashboard@index')->name('home');
Route::get('/policy/create', 'Policy\CreateController@showForm');
Route::get('/policy/types', 'Policy\TypeController@index');
Route::post('/policy/types', 'Policy\TypeController@types');
Route::post('/policy/types/{policy_type}/delete', 'Policy\TypeController@delete');
Auth::routes();


