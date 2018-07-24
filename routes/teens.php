<?php

Route::prefix('teens')->group(function() {
	Route::home('teens');
	Route::login('teens');
	Route::dashboard('teens');
	Route::dashboardUser('teens');
	Route::dashboardOrders('teens');
	Route::dashboardOrderDetails('teens');
	Route::category('teens');
	Route::product('teens');
	Route::wishlist('teens');
	Route::cart('teens');
	Route::checkout('teens');
	Route::register('teens');
	Route::order('teens');


	Route::get('/order-success', function (){
		return view('age-layouts.teens.order-success');
	})->name('teens-order-success');

	Route::get('/help', function (){
		return view('age-layouts.teens.help');
	})->name('teens-help');

	Route::get('/help/delivery', function (){
		return view('age-layouts.teens.help-delivery');
	})->name('teens-help-delivery');

	Route::get('/help/payment', function (){
		return view('age-layouts.teens.help-payment');
	})->name('teens-help-payment');

	Route::get('/help/retoure', function (){
		return view('age-layouts.teens.help-retoure');
	})->name('teens-help-retoure');

	Route::get('/help/order', function (){
		return view('age-layouts.teens.help-order');
	})->name('teens-help-order');

	Route::get('/results', function (){
		return view('age-layouts.teens.results');
	})->name('teens-results');

	Route::get('/contact', function (){
		return view('age-layouts.teens.contact');
	})->name('teens-contact');

	Route::get('/about', function (){
		return view('age-layouts.teens.about');
	})->name('teens-about');
});