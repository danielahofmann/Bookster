<?php

Route::prefix('kids')->group(function() {
	Route::home('kids');
	Route::category('kids');

	Route::get('/product/{id}', function ($id) {
		$product = App\Product::where('id', $id)
		                      ->with('image')
		                      ->with('author')
		                      ->where('ebook', 0)
		                      ->get();

		return view('age-layouts.kids.product', ['product' => $product]);
	})->name('kids-product');

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