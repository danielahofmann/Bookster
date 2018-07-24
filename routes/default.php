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
	

	Route::get('/help', function (){
		return view('age-layouts.default.help');
	})->name('default-help');

	Route::get('/help/delivery', function (){
		return view('age-layouts.default.help-delivery');
	})->name('default-help-delivery');

	Route::get('/help/payment', function (){
		return view('age-layouts.default.help-payment');
	})->name('default-help-payment');

	Route::get('/help/retoure', function (){
		return view('age-layouts.default.help-retoure');
	})->name('default-help-retoure');

	Route::get('/help/order', function (){
		return view('age-layouts.default.help-order');
	})->name('default-help-order');

	Route::get('/results', function (){
		return view('age-layouts.default.results');
	})->name('default-results');

	Route::get('/contact', function (){
		return view('age-layouts.default.contact');
	})->name('default-contact');

	Route::get('/about', function (){
		return view('age-layouts.default.about');
	})->name('default-about');

});
