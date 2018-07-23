<?php
Route::prefix('admin')->group(function() {
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::post('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');
	Route::get('/', 'UserController@index')->name('admin.dashboard');

	Route::get( '/', function () {
		$user = Auth::guard('admin')->user();


		return view('admin.pages.dashboard', ['user' => $user]);
	})->name('admin.dashboard');

	Route::get( '/products', function () {
		$user = Auth::guard('admin')->user();


		return view('admin.pages.products', ['user' => $user]);
	})->name('admin.products');

	Route::get( '/users', function () {
		$user = Auth::guard('admin')->user();

		return view('admin.pages.users', ['user' => $user]);
	})->name('admin.users');

	Route::get( '/orders', function () {
		$user = Auth::guard('admin')->user();

		$orders = \App\Order::with('state')
		                    ->with('approval')
		                    ->with('customer')
							->orderBy('created_at', 'DESC')
		                    ->get();

		return view('admin.pages.orders', ['user' => $user, 'orders' => $orders]);
	})->name('admin.orders');

	Route::get( '/order/{id}', function ($id) {
		$user = Auth::guard('admin')->user();

		$order = \App\Order::where('id', $id)
		                   ->with('state')
		                   ->with('products')
		                   ->with('approval')
							->with('customer')
		                   ->first();

		$states = \App\State::all();

		$billAddress = \App\BillAddress::find($order->billAddress_id);
		$deliveryAddress = \App\DeliveryAddress::find($order->deliveryAddress_id);

		return view('admin.pages.order', ['order' => $order, 'user' => $user, 'bill' => $billAddress, 'delivery' => $deliveryAddress, 'states' => $states]);
	})->name('admin.order');

	Route::patch('/order/update/{id}', 'OrderController@update')->name('admin.order.update');
	Route::delete('/order/delete/{id}', 'OrderController@destroy')->name('admin.order.delete');
});