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
	Route::help('seniors');
	Route::results('seniors');

	Route::get('/contact', function (){
		return view('age-layouts.seniors.contact');
	})->name('seniors-contact');

	Route::get('/about', function (){
		return view('age-layouts.seniors.about');
	})->name('seniors-about');
});