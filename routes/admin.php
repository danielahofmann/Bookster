<?php
Route::prefix('admin')->group(function() {
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::post('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');
	Route::get('/', 'UserController@index')->name('admin.dashboard');

	Route::get( '/', function () {
		$user = Auth::guard('admin')->user();


		return view('admin.pages.dashboard', ['user' => $user]);
	})->name('admin.dashboard');
});