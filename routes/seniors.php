<?php

Route::prefix('seniors')->group(function() {
	Route::get( '/', function () {
		return view('age-layouts.seniors.home');
	})->name('seniors-home');

	Route::get( '/category/{category_id}', function ($category_id) {
		$category = App\Category::find($category_id);
		$genres = App\Genre::where('category_id', $category_id)->get();

		$filterCategory = function($query) use ($category_id) {
			$query->where('category_id', $category_id);
		};

		$authors = App\Author::whereHas('categories', $filterCategory)->with(['categories' => $filterCategory])->get();

		return view('age-layouts.seniors.category', ['category' => $category, 'genres' => $genres, 'authors' => $authors]);
	})->name('seniors-category');

	Route::get('/product/{id}', function ($id) {
		$product = App\Product::where('id', $id)
		                      ->with('image')
		                      ->with('author')
		                      ->with('category')
		                      ->with('genre')
		                      ->where('ebook', 0)
		                      ->get();

		return view('age-layouts.seniors.product', ['product' => $product]);
	})->name('seniors-product');

	Route::get('/wishlist', function() {
		if(!Session::has('wishlist')){
			return view('age-layouts.seniors.wishlist', ['products' => null]);
		}

		$oldWishlist = Session::get('wishlist');
		$wishlist = new App\WishlistSession($oldWishlist);

		return view('age-layouts.seniors.wishlist', ['products' => $wishlist->items]);
	})->name('seniors-wishlist');

	Route::get('/cart', function() {
		if(!Session::has('cart')){
			return view('age-layouts.seniors.cart', ['products' => null]);
		}

		$oldCart = Session::get('cart');
		$cart = new App\Cart($oldCart);

		return view('age-layouts.seniors.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
	})->name('seniors-cart');

	Route::get( '/login', function () {
		$guard = null;
		if ( Auth::guard( $guard )->check() ) {
			return redirect('/seniors/dashboard');
		}

		return view( 'age-layouts.seniors.login' );
	} )->name( 'seniors-login' );

	Route::get( '/dashboard', function () {
		return view('age-layouts.seniors.dashboard');
	})->name('seniors-dashboard');

	Route::get( '/register', function () {
		return view( 'age-layouts.seniors.register' );
	} )->name( 'seniors-register' );

	Route::post('register', 'Auth\RegisterController@register');

	Route::get('/checkout', function() {
		if(!empty(\Illuminate\Support\Facades\Auth::user())){
			return redirect('seniors/order');
		}

		return view('age-layouts.seniors.checkout');
	})->name('seniors-checkout');

	Route::get('/order', function() {
		$oldCart = Session::get('cart');
		$cart = new App\Cart($oldCart);

		$customer_id = \Illuminate\Support\Facades\Auth::user()->id;
		$customer = \App\Customer::find($customer_id);

		$billAddress = null;
		$deliveryAddress = null;

		if(Session::has('billAddress')){
			$billAddress = Session::get('billAddress');
		}

		if(Session::has('deliveryAddress')){
			$deliveryAddress = Session::get('deliveryAddress');
		}


		return view('age-layouts.seniors.order', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice, 'customer' => $customer, 'bill' => $billAddress, 'delivery' => $deliveryAddress]);
	})->name('seniors-order');

	Route::get('/order-success', function (){
		return view('age-layouts.seniors.order-success');
	})->name('seniors-order-success');
});