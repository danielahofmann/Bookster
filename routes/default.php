<?php

Route::prefix('default')->group(function() {
	Route::home('default');
	Route::login('default');
	Route::dashboard('default');
	Route::dashboardUser('default');
	Route::dashboardOrders('default');
	Route::dashboardOrderDetails('default');
	Route::category('default');
	Route::product('default');
	Route::wishlist('default');
	Route::cart('default');
	Route::checkout('default');
	Route::register('default');
	Route::order('default');
	Route::help('default');
	Route::results('default');

	Route::get('/contact', function (){
		return view('age-layouts.default.contact');
	})->name('default-contact');

	Route::get('/about', function (){
		return view('age-layouts.default.about');
	})->name('default-about');

});
