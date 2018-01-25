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

Route::get('/', function () {
    return view('welcomePage.welcome');
});

Route::get('/user', function() {
	return view('userPages.home');
});
Route::get('/company', function() {
	return view('companyPages.home');
});
Route::get('/admin', function() {
	return view('adminPages.home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/store/{data1}/{data2}', 'SensorDataController@store');
