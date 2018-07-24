<?php

Route::prefix('kids')->group(function() {
	Route::home('kids');
	Route::category('kids');
	Route::product('kids');
	Route::wishlist('kids');
	Route::results('kids');

	Route::get('/send', function(){
		return view('age-layouts.kids.send');
	})->name('kids-send-wishlist');
});