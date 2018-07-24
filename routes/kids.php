<?php

Route::prefix('kids')->group(function() {
	Route::home('kids');
	Route::category('kids');
	Route::product('kids');

	Route::get('/wishlist', function() {
		if(!Session::has('wishlist')){
			return view('age-layouts.kids.wishlist', ['products' => null]);
		}

		$oldWishlist = Session::get('wishlist');
		$wishlist = new App\WishlistSession($oldWishlist);

		return view('age-layouts.kids.wishlist', ['products' => $wishlist->items]);
	})->name('kids-wishlist');

	Route::get('/send', function(){
		return view('age-layouts.kids.send');
	})->name('kids-send-wishlist');

	Route::get('/results', function (){
		return view('age-layouts.kids.results');
	})->name('kids-results');
});