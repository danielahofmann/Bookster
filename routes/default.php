<?php

Route::prefix('default')->group(function() {
	Route::get( '/', function () {
		return view('age-layouts.default.home');
	})->name('default-home');

	Route::get( '/login', function () {
		$guard = null;
		if ( Auth::guard( $guard )->check() ) {
			return redirect('/default/dashboard');
		}

		return view( 'age-layouts.default.login' );
	} )->name( 'default-login' );

	Route::get( '/dashboard', function () {
		return view('age-layouts.default.dashboard');
	})->name('default-dashboard');

	Route::get( '/category/{category_id}', function ($category_id) {
		$category = App\Category::find($category_id);
		$genres = App\Genre::where('category_id', $category_id)->get();

		$filterCategory = function($query) use ($category_id) {
			$query->where('category_id', $category_id);
		};

		$authors = App\Author::whereHas('categories', $filterCategory)->with(['categories' => $filterCategory])->get();

		return view('age-layouts.default.category', ['category' => $category, 'genres' => $genres, 'authors' => $authors]);
	})->name('default-category');

	Route::get('/product/{id}', function ($id) {
		$product = App\Product::where('id', $id)
		                      ->with('image')
		                      ->with('author')
		                      ->with('category')
		                      ->with('genre')
		                      ->where('ebook', 0)
		                      ->get();

		return view('age-layouts.default.product', ['product' => $product]);
	})->name('default-product');

	Route::get('/wishlist', function() {
		if(!Session::has('wishlist')){
			return view('age-layouts.default.wishlist', ['products' => null]);
		}

		$oldWishlist = Session::get('wishlist');
		$wishlist = new App\WishlistSession($oldWishlist);

		return view('age-layouts.default.wishlist', ['products' => $wishlist->items]);
	})->name('default-wishlist');


	Route::get('/cart', function() {
		if(!Session::has('cart')){
			return view('age-layouts.default.cart', ['products' => null]);
		}

		$oldCart = Session::get('cart');
		$cart = new App\Cart($oldCart);

		return view('age-layouts.default.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
	})->name('default-cart');

	Route::get('/checkout', function() {
		if(!Session::has('cart')){
			return view('age-layouts.default.checkout', ['products' => null]);
		}

		$oldCart = Session::get('cart');
		$cart = new App\Cart($oldCart);

		return view('age-layouts.default.checkout', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
	})->name('default-checkout');

	Route::get( '/register', function () {
		return view( 'age-layouts.default.register' );
	} )->name( 'default-register' );

	Route::post('register', 'Auth\RegisterController@register');
});
