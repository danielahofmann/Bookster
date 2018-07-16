<?php

Route::prefix('elderly')->group(function() {
	Route::get( '/', function () {
		return view('age-layouts.elderly.home');
	})->name('elderly-home');

	Route::get( '/category/{category_id}', function ($category_id) {
		$category = App\Category::find($category_id);
		$genres = App\Genre::where('category_id', $category_id)->get();

		$filterCategory = function($query) use ($category_id) {
			$query->where('category_id', $category_id);
		};

		$authors = App\Author::whereHas('categories', $filterCategory)->with(['categories' => $filterCategory])->get();

		return view('age-layouts.elderly.category', ['category' => $category, 'genres' => $genres, 'authors' => $authors]);

	})->name('elderly-category');

	Route::get('/product/{id}', function ($id) {
		$product = App\Product::where('id', $id)
		                      ->with('image')
		                      ->with('author')
		                      ->with('category')
		                      ->with('genre')
		                      ->where('ebook', 0)
		                      ->get();

		return view('age-layouts.elderly.product', ['product' => $product]);
	})->name('elderly-product');

	Route::get('/wishlist', function() {
		if(!Session::has('wishlist')){
			return view('age-layouts.elderly.wishlist', ['products' => null]);
		}

		$oldWishlist = Session::get('wishlist');
		$wishlist = new App\WishlistSession($oldWishlist);

		return view('age-layouts.elderly.wishlist', ['products' => $wishlist->items]);
	})->name('elderly-wishlist');

	Route::get('/cart', function() {
		if(!Session::has('cart')){
			return view('age-layouts.elderly.cart', ['products' => null]);
		}

		$oldCart = Session::get('cart');
		$cart = new App\Cart($oldCart);

		return view('age-layouts.elderly.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
	})->name('elderly-cart');

	Route::get('/checkout', function() {
		if(!Session::has('cart')){
			return view('age-layouts.elderly.checkout', ['products' => null]);
		}

		$oldCart = Session::get('cart');
		$cart = new App\Cart($oldCart);

		return view('age-layouts.elderly.checkout', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
	})->name('elderly-checkout');

	Route::get( '/login', function () {
		$guard = null;
		if ( Auth::guard( $guard )->check() ) {
			return redirect('/elderly/dashboard');
		}

		return view( 'age-layouts.elderly.login' );
	} )->name( 'elderly-login' );

	Route::get( '/dashboard', function () {
		return view('age-layouts.elderly.dashboard');
	})->name('elderly-dashboard');

	Route::get( '/register', function () {
		return view( 'age-layouts.elderly.register' );
	} )->name( 'elderly-register' );

	Route::post('register', 'Auth\RegisterController@register');
});