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
	Route::help('elderly');


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