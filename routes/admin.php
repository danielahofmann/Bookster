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

		$products = \App\Product::with( 'author' )
		                        ->with( 'category' )
		                        ->with( 'genre' )
		                        ->with( 'image' )
		                        ->orderBy( 'created_at', 'DESC' )
		                        ->get();
		return view('admin.pages.products', ['user' => $user, 'products' => $products]);
	})->name('admin.products');

	Route::get( '/users', function () {
		$user = Auth::guard('admin')->user();

		$employees = \App\User::all();

		return view('admin.pages.users', ['user' => $user, 'employees' => $employees]);
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

	Route::get( '/user/edit/{id}', function ($id) {
		$user = Auth::guard('admin')->user();

		$employee = \App\User::find($id);

		return view('admin.pages.users.edit', ['user' => $user, 'employee' => $employee]);
	})->name('admin.user.edit');

	Route::patch('/order/update/{id}', 'OrderController@update')->name('admin.order.update');
	Route::delete('/order/delete/{id}', 'OrderController@destroy')->name('admin.order.delete');

	Route::patch('/user/update/{id}', 'UserController@updateEmployee')->name('admin.user.update');
	Route::delete('/user/delete/{id}', 'UserController@destroy')->name('admin.user.delete');
	Route::post('/user/store', 'UserController@store')->name('admin.user.store');

	Route::patch('/product/update/{id}', 'ProductController@update')->name('admin.product.update');
	Route::delete('/product/delete/{id}', 'ProductController@destroy')->name('admin.product.delete');
	Route::post('/product/store', 'ProductController@store')->name('admin.product.store');

	Route::get( '/user/delete-form/{id}', function ($id) {
		$user = Auth::guard('admin')->user();

		$employee = \App\User::find($id);

		return view('admin.pages.user-delete', ['user' => $user, 'employee' => $employee]);
	})->name('admin.user.delete-form');

	Route::get( '/product/delete-form/{id}', function ($id) {
		$user = Auth::guard('admin')->user();

		$product = \App\Product::find($id);

		return view('admin.pages.product-delete', ['user' => $user, 'product' => $product]);
	})->name('admin.product.delete-form');

	Route::get( '/user/create', function () {
		$user = Auth::guard('admin')->user();

		return view('admin.pages.users.create', ['user' => $user]);
	})->name('admin.user.create');


	Route::get( '/product/edit/{id}', function ($id) {
		$user = Auth::guard('admin')->user();

		$product = \App\Product::where('id', $id)
								->with('author')
								->with('image')
								->with('genre')
								->with('category')
								->with('character')
								->first();

		$categories = \App\Category::all();
		$genres = \App\Genre::all();
		$authors = \App\Author::all();
		$characters = \App\Character::all();

		return view('admin.pages.products.edit', ['user' => $user, 'product' => $product, 'genres' => $genres,
		                                          'categories' => $categories, 'authors' => $authors, 'characters' => $characters]);
	})->name('admin.product.edit');

	Route::get( '/product/create', function () {
		$user = Auth::guard('admin')->user();

		$categories = \App\Category::all();
		$genres = \App\Genre::all();
		$authors = \App\Author::all();
		$characters = \App\Character::all();

		return view('admin.pages.products.create', ['user' => $user, 'genres' => $genres,
		                                          'categories' => $categories, 'authors' => $authors, 'characters' => $characters]);
	})->name('admin.product.create');

});