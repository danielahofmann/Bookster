<?php

Route::prefix('toddlers')->group(function() {
	Route::home('toddlers');
	Route::product('toddlers');


	Route::get('/character/{character_id}', function ($character_id) {
		$character = App\Character::where('id', $character_id)->with('character_image')->get();
		$products = App\Product::where('character_id', $character_id)->with('image')->get();

		return view('age-layouts.toddlers.category', ['character' => $character[0], 'products' => $products]);
	})->name('toddlers-character');

	Route::get('/wishlist', function() {
		if(!Session::has('wishlist')){
			return view('age-layouts.toddlers.wishlist', ['products' => null]);
		}

		$oldWishlist = Session::get('wishlist');
		$wishlist = new App\WishlistSession($oldWishlist);

		return view('age-layouts.toddlers.wishlist', ['products' => $wishlist->items]);
	})->name('toddlers-wishlist');

	Route::get('/send', function(){
		return view('age-layouts.toddlers.send');
	})->name('toddlers-send-wishlist');
});