<?php

Route::prefix('elderly')->group(function() {
	Route::home('elderly');
	Route::login('elderly');
	Route::dashboard('elderly');
	Route::dashboardUser('elderly');
	Route::dashboardOrders('elderly');
	Route::dashboardOrderDetails('elderly');
	Route::category('elderly');
	Route::product('elderly');
	Route::wishlist('elderly');
	Route::cart('elderly');
	Route::checkout('elderly');
	Route::register('elderly');
	Route::order('elderly');


	Route::get('/order-success', function (){
		return view('age-layouts.elderly.order-success');
	})->name('elderly-order-success');

	Route::get('/help', function (){
		return view('age-layouts.elderly.help');
	})->name('elderly-help');

	Route::get('/help/delivery', function (){
		return view('age-layouts.elderly.help-delivery');
	})->name('elderly-help-delivery');

	Route::get('/help/payment', function (){
		return view('age-layouts.elderly.help-payment');
	})->name('elderly-help-payment');

	Route::get('/help/retoure', function (){
		return view('age-layouts.elderly.help-retoure');
	})->name('elderly-help-retoure');

	Route::get('/help/order', function (){
		return view('age-layouts.elderly.help-order');
	})->name('elderly-help-order');

	Route::get('/results', function (){
		return view('age-layouts.elderly.results');
	})->name('elderly-results');

	Route::get('/contact', function (){
		return view('age-layouts.elderly.contact');
	})->name('elderly-contact');

	Route::get('/about', function (){
		return view('age-layouts.elderly.about');
	})->name('elderly-about');
});