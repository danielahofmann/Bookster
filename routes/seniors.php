<?php

Route::prefix('seniors')->group(function() {
	Route::home('seniors');
	Route::login('seniors');
	Route::dashboard('seniors');
	Route::dashboardUser('seniors');
	Route::dashboardOrders('seniors');
	Route::dashboardOrderDetails('seniors');
	Route::category('seniors');
	Route::product('seniors');
	Route::wishlist('seniors');
	Route::cart('seniors');
	Route::checkout('seniors');
	Route::register('seniors');
	Route::order('seniors');

	Route::get('/help', function (){
		return view('age-layouts.seniors.help');
	})->name('seniors-help');

	Route::get('/help/delivery', function (){
		return view('age-layouts.seniors.help-delivery');
	})->name('seniors-help-delivery');

	Route::get('/help/payment', function (){
		return view('age-layouts.seniors.help-payment');
	})->name('seniors-help-payment');

	Route::get('/help/retoure', function (){
		return view('age-layouts.seniors.help-retoure');
	})->name('seniors-help-retoure');

	Route::get('/help/order', function (){
		return view('age-layouts.seniors.help-order');
	})->name('seniors-help-order');

	Route::get('/results', function (){
		return view('age-layouts.seniors.results');
	})->name('seniors-results');

	Route::get('/contact', function (){
		return view('age-layouts.seniors.contact');
	})->name('seniors-contact');

	Route::get('/about', function (){
		return view('age-layouts.seniors.about');
	})->name('seniors-about');
});