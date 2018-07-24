<?php

Route::prefix('elderly')->group(function() {
	Route::home('elderly');
	Route::login('elderly');
	Route::dashboard('elderly');
	Route::dashboardUser('elderly');
	Route::dashboardOrders('elderly');
	Route::dashboardOrderDetails('elderly');
	Route::category('elderly');
	Route::product('elderly');
	Route::wishlist('elderly');

	Route::get('/cart', function() {
		if(!Session::has('cart')){
			return view('age-layouts.elderly.cart', ['products' => null]);
		}

		$oldCart = Session::get('cart');
		$cart = new App\Cart($oldCart);

		return view('age-layouts.elderly.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
	})->name('elderly-cart');


	Route::get( '/register', function () {
		return view( 'age-layouts.elderly.register' );
	} )->name( 'elderly-register' );

	Route::post('register', 'Auth\RegisterController@register');

	Route::get('/checkout', function() {
		if(!empty(\Illuminate\Support\Facades\Auth::user())){
			return redirect('elderly/order');
		}

		return view('age-layouts.elderly.checkout');
	})->name('elderly-checkout');

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


		return view('age-layouts.elderly.order', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice, 'customer' => $customer, 'bill' => $billAddress, 'delivery' => $deliveryAddress]);
	})->name('elderly-order');

	Route::get('/order-success', function (){
		return view('age-layouts.elderly.order-success');
	})->name('elderly-order-success');

	Route::get('/help', function (){
		return view('age-layouts.elderly.help');
	})->name('elderly-help');

	Route::get('/help/delivery', function (){
		return view('age-layouts.elderly.help-delivery');
	})->name('elderly-help-delivery');

	Route::get('/help/payment', function (){
		return view('age-layouts.elderly.help-payment');
	})->name('elderly-help-payment');

	Route::get('/help/retoure', function (){
		return view('age-layouts.elderly.help-retoure');
	})->name('elderly-help-retoure');

	Route::get('/help/order', function (){
		return view('age-layouts.elderly.help-order');
	})->name('elderly-help-order');

	Route::get('/results', function (){
		return view('age-layouts.elderly.results');
	})->name('elderly-results');

	Route::get('/contact', function (){
		return view('age-layouts.elderly.contact');
	})->name('elderly-contact');

	Route::get('/about', function (){
		return view('age-layouts.elderly.about');
	})->name('elderly-about');
});