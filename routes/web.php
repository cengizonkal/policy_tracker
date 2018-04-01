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
Route::get('logout', 'Auth\LoginController@logout');


Route::get('/', 'Dashboard@index')->middleware('auth');
Route::get('/home', 'Dashboard@index')->name('home')->middleware('auth');
Route::get('/policy/create', 'PolicyController@showForm')->middleware('auth');
Route::post('/policy/create', 'PolicyController@create')->middleware('auth');
Route::get('/policy/{policy}/details', 'PolicyController@details')->middleware('auth');
Route::post('/policy/{policy}/details', 'PolicyController@saveDetails')->middleware('auth');

Route::get('/policy/{policy}/delete', 'PolicyController@delete')->middleware('auth');

Route::get('/policy/create_existing', 'PolicyController@showExistingForm')->middleware('auth');
Route::post('/policy/create_existing', 'PolicyController@createExisting')->middleware('auth');

Route::get('/policy/list', 'PolicyController@getList')->middleware('auth');

Route::get('/customers', 'Customer\CustomerController@index')->middleware('auth');
Route::get('/customer/list', 'Customer\CustomerController@index')->middleware('auth');
Route::get('/customer/{customer}/policies', 'Customer\CustomerController@policies')->middleware('auth');
Route::get('/customer/{customer}/accounting', 'Customer\AccountingController@index')->middleware('auth');
Route::get('/customer/{customer}/accounting/add', 'Customer\AccountingController@add')->middleware('auth');
Route::get('/customer/{customer}/update', 'Customer\CustomerController@updateForm')->middleware('auth');
Route::post('/customer/{customer}/update', 'Customer\CustomerController@update')->middleware('auth');
Route::get('/customer/{customer}/delete', 'Customer\CustomerController@delete')->middleware('auth');

Route::get('/followup/list', 'FollowupController@index')->middleware('auth');
Route::get('/followups', 'FollowupController@index')->middleware('auth');
Route::post('/followup/{followup}/close', 'FollowupController@close')->middleware('auth');

Route::get('/policy/types', 'PolicyTypeController@index')->middleware('auth');
Route::post('/policy/types', 'PolicyTypeController@types')->middleware('auth');
Route::post('/policy/types/{policy_type}/delete', 'PolicyTypeController@delete')->middleware('auth');


Route::get('/accounting/list', 'AccountingController@index')->middleware('auth');

Route::get('/accounting/{accounting_record}/delete', 'AccountingController@delete')->middleware('auth');

Route::post('/accounting/create', 'AccountingController@create')->middleware('auth');




