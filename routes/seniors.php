<?php

Route::prefix('seniors')->group(function() {
	Route::home('seniors');
	Route::login('seniors');
	Route::dashboard('seniors');
	Route::dashboardUser('seniors');
	Route::dashboardOrders('seniors');
	Route::dashboardOrderDetails('seniors');
	Route::category('seniors');
	Route::product('seniors');
	Route::wishlist('seniors');


	Route::get('/cart', function() {
		if(!Session::has('cart')){
			return view('age-layouts.seniors.cart', ['products' => null]);
		}

		$oldCart = Session::get('cart');
		$cart = new App\Cart($oldCart);

		return view('age-layouts.seniors.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
	})->name('seniors-cart');


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

	Route::get('/help', function (){
		return view('age-layouts.seniors.help');
	})->name('seniors-help');

	Route::get('/help/delivery', function (){
		return view('age-layouts.seniors.help-delivery');
	})->name('seniors-help-delivery');

	Route::get('/help/payment', function (){
		return view('age-layouts.seniors.help-payment');
	})->name('seniors-help-payment');

	Route::get('/help/retoure', function (){
		return view('age-layouts.seniors.help-retoure');
	})->name('seniors-help-retoure');

	Route::get('/help/order', function (){
		return view('age-layouts.seniors.help-order');
	})->name('seniors-help-order');

	Route::get('/results', function (){
		return view('age-layouts.seniors.results');
	})->name('seniors-results');

	Route::get('/contact', function (){
		return view('age-layouts.seniors.contact');
	})->name('seniors-contact');

	Route::get('/about', function (){
		return view('age-layouts.seniors.about');
	})->name('seniors-about');
});