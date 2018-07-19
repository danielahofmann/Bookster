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
		$customer = Auth::user();

		$orders = \App\Order::where('customer_id', $customer->id)->get();

		return view('age-layouts.default.dashboard', ['customer' => $customer, 'orders' => $orders]);
	})->name('default-dashboard');

	Route::get( '/dashboard/user', function () {
		$customer = Auth::user();

		return view('age-layouts.default.dashboard-user', ['customer' => $customer]);
	})->name('default-dashboard-user');

	Route::get( '/dashboard/orders', function () {
		$customer = Auth::user();

		$orders = \App\Order::where('customer_id', $customer->id)->get();

		return view('age-layouts.default.dashboard-order', ['orders' => $orders, 'customer' => $customer]);
	})->name('default-dashboard-order');

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
		if(!empty(\Illuminate\Support\Facades\Auth::user())){
			return redirect('default/order');
		}

		return view('age-layouts.default.checkout');
	})->name('default-checkout');

	Route::get( '/register', function () {
		return view( 'age-layouts.default.register' );
	} )->name( 'default-register' );

	Route::post('register', 'Auth\RegisterController@register');


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


		return view('age-layouts.default.order', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice, 'customer' => $customer, 'bill' => $billAddress, 'delivery' => $deliveryAddress]);
	})->name('default-order');

	Route::get('/order-success', function (){
		return view('age-layouts.default.order-success');
	})->name('default-order-success');

	Route::get('/help', function (){
		return view('age-layouts.default.help');
	})->name('default-help');

	Route::get('/help/delivery', function (){
		return view('age-layouts.default.help-delivery');
	})->name('default-help-delivery');

	Route::get('/help/payment', function (){
		return view('age-layouts.default.help-payment');
	})->name('default-help-payment');

	Route::get('/help/retoure', function (){
		return view('age-layouts.default.help-retoure');
	})->name('default-help-retoure');

	Route::get('/help/order', function (){
		return view('age-layouts.default.help-order');
	})->name('default-help-order');
});
