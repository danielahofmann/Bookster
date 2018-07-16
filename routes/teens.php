<?php

Route::prefix('teens')->group(function() {
	Route::get( '/', function () {
		return view('age-layouts.teens.home');
	})->name('teens-home');

	Route::get( '/category/{category_id}', function ($category_id) {
		$category = App\Category::find($category_id);
		$genres = App\Genre::where('category_id', $category_id)->get();

		$filterCategory = function($query) use ($category_id) {
			$query->where('category_id', $category_id);
		};

		$authors = App\Author::whereHas('categories', $filterCategory)->with(['categories' => $filterCategory])->get();

		return view('age-layouts.teens.category', ['category' => $category, 'genres' => $genres, 'authors' => $authors]);
	})->name('teens-category');

	Route::get('/product/{id}', function ($id) {
		$product = App\Product::where('id', $id)
		                      ->with('image')
		                      ->with('author')
		                      ->with('category')
		                      ->with('genre')
		                      ->where('ebook', 0)
		                      ->get();

		return view('age-layouts.teens.product', ['product' => $product]);
	})->name('teens-product');

	Route::get('/wishlist', function() {
		if(!Session::has('wishlist')){
			return view('age-layouts.teens.wishlist', ['products' => null]);
		}

		$oldWishlist = Session::get('wishlist');
		$wishlist = new App\WishlistSession($oldWishlist);

		return view('age-layouts.teens.wishlist', ['products' => $wishlist->items]);
	})->name('teens-wishlist');

	Route::get('/cart', function() {
		if(!Session::has('cart')){
			return view('age-layouts.teens.cart', ['products' => null]);
		}

		$oldCart = Session::get('cart');
		$cart = new App\Cart($oldCart);

		return view('age-layouts.teens.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
	})->name('teens-cart');

	Route::get('/checkout', function() {
		if(!Session::has('cart')){
			return view('age-layouts.teens.checkout', ['products' => null]);
		}

		$oldCart = Session::get('cart');
		$cart = new App\Cart($oldCart);

		return view('age-layouts.teens.checkout', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
	})->name('teens-checkout');

	Route::get( '/login', function () {
		$guard = null;
		if ( Auth::guard( $guard )->check() ) {
			return redirect('/teens/dashboard');
		}

		return view( 'age-layouts.teens.login' );
	} )->name( 'teens-login' );

	Route::get( '/dashboard', function () {
		return view('age-layouts.teens.dashboard');
	})->name('teens-dashboard');

	Route::get( '/register', function () {
		return view( 'age-layouts.teens.register' );
	} )->name( 'teens-register' );

	Route::post('register', 'Auth\RegisterController@register');

	Route::get('/checkout', function() {
		if(!empty(\Illuminate\Support\Facades\Auth::user())){
			return redirect('teens/order');
		}

		return view('age-layouts.teens.checkout');
	})->name('teens-checkout');
});