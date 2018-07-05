<?php

Route::prefix('kids')->group(function() {
	Route::get( '/', function () {
		return view('age-layouts.kids.home');
	} );

	Route::get( '/category/{category_id}', function ($category_id) {
		$category = App\Category::find($category_id);
		$genres = App\Genre::where('category_id', $category_id)->get();

		$filterCategory = function($query) use ($category_id) {
			$query->where('category_id', $category_id);
		};

		$authors = App\Author::whereHas('categories', $filterCategory)->with(['categories' => $filterCategory])->get();

		return view('age-layouts.kids.category', ['category' => $category, 'genres' => $genres, 'authors' => $authors]);
	});

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
});