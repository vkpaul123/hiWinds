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

Auth::routes();

//	Store sensor data into database 
Route::get('/store/{windmill_id}/{current}/{voltage}/{humidity}/{temperature}', 'SensorController@store');

//	USER/COMPANY Routes
Route::group(['namespace' => 'User'], function() {
	Route::get('/home', 'HomeController@index')->name('home');
	
	Route::resource('/address','AddressController');

	Route::resource('/windmill','WindmillController');
	Route::resource('/windmillAddress', 'WindmillAddressController');
	Route::get('/windmill/{id}/log', 'SensorDataController@showWindmillLog')->name('windmill.log');

	Route::get('/user/profileView','ShowUserProfileController@showProfile')->name('user.viewProfile');
	Route::get('/user/profileEdit','ShowUserProfileController@editProfile')->name('user.profileEdit');
	Route::put('/user/profileEdit','ShowUserProfileController@updateProfile')->name('user.profileUpdate');
	Route::put('/user/profilePhotoEdit', 'ProfilePhotoController@photoUpload')->name('user.profilePhotoUpload');

	Route::post('/windmill/excel/upload', 'WindmillExcelUploadController@uploadWindmills')->name('windmill.excel.upload');

	Route::post('/home/runPython/', 'PythonRunnerTestController@pythonScript')->name('python.test.url');
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



