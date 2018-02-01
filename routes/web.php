<?php

use Illuminate\Support\Facades\Auth;

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
    if(Auth::guest())
    	return view('welcomePage.welcome');
    else
    	return redirect(route('home'));
});

Route::get('/welcome', function() {
	return view('welcomePage.welcome');
});

//	USER/COMPANY Routes
Route::group(['namespace' => 'User'], function() {
	Route::resource('/address','AddressController');

	Route::resource('/windmill','WindmillController');
	Route::resource('/windmillAddress', 'WindmillAddressController');

	Route::get('/user/profileView','ShowUserProfileController@showProfile')->name('user.viewProfile');
});

//	ADMIN Routes
Route::group(['namespace' => 'Admin'], function() {
	Route::prefix('admin')->group(function() {
		Route::get('/', 'HomeController@index')->name('admin.home');

		//	Auth
		Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
		Route::post('login', 'Auth\LoginController@login');
		Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
		Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('admin.register');
		Route::post('register', 'Auth\RegisterController@register');
		Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
		Route::post('password/reset', 'Auth\ResetPasswordController@reset');
		Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
		Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');
	});
});

Auth::routes();

Route::get('/home', 'User\HomeController@index')->name('home');

Route::get('/store/{data1}/{data2}', 'SensorDataController@store');
