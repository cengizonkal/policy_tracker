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


Auth::routes();

Route::get('/', 'Dashboard@index');
Route::get('/home', 'Dashboard@index')->name('home');
Route::get('/policy/create', 'Policy\CreateController@showForm');
Route::post('/policy/create', 'Policy\CreateController@create');
Route::get('/policy/{policy}/items', 'Policy\CreateController@items');
Route::post('/policy/{policy}/items', 'Policy\CreateController@saveItems');

Route::get('/policy/list', 'Policy\ListController@index');

Route::get('/customer/list', 'Customer\CustomerController@index');
Route::get('/customer/{customer}/policies', 'Customer\CustomerController@policies');

Route::get('/policy/types', 'Policy\TypeController@index');
Route::post('/policy/types', 'Policy\TypeController@types');
Route::post('/policy/types/{policy_type}/delete', 'Policy\TypeController@delete');



