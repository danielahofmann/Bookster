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

	Route::get( '/authors', function () {
		$user = Auth::guard('admin')->user();

		$authors = \App\Author::with( 'author_image' )
		                        ->orderBy( 'created_at', 'DESC' )
		                        ->get();
		return view('admin.pages.authors', ['user' => $user, 'authors' => $authors]);
	})->name('admin.authors');

	Route::get( '/characters', function () {
		$user = Auth::guard('admin')->user();

		$characters = \App\Character::with( 'character_image' )
		                        ->orderBy( 'created_at', 'DESC' )
		                        ->get();

		return view('admin.pages.characters', ['user' => $user, 'characters' => $characters]);
	})->name('admin.characters');


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

	Route::post('/product/update/{id}', 'ProductController@update')->name('admin.product.update');
	Route::delete('/product/delete/{id}', 'ProductController@destroy')->name('admin.product.delete');
	Route::post('/product/store', 'ProductController@store')->name('admin.product.store');

	Route::post('/character/update/{id}', 'CharacterController@update')->name('admin.character.update');
	Route::delete('/character/delete/{id}', 'CharacterController@destroy')->name('admin.character.delete');
	Route::post('/character/store', 'CharacterController@store')->name('admin.character.store');

	Route::post('/author/update/{id}', 'AuthorController@update')->name('admin.author.update');
	Route::delete('/author/delete/{id}', 'AuthorController@destroy')->name('admin.author.delete');
	Route::post('/author/store', 'AuthorController@store')->name('admin.author.store');


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

	Route::get( '/character/delete-form/{id}', function ($id) {
		$user = Auth::guard('admin')->user();

		$character = \App\Character::find($id);

		return view('admin.pages.character-delete', ['user' => $user, 'character' => $character]);
	})->name('admin.character.delete-form');

	Route::get( '/author/delete-form/{id}', function ($id) {
		$user = Auth::guard('admin')->user();

		$author = \App\Author::find($id);

		return view('admin.pages.author-delete', ['user' => $user, 'author' => $author]);
	})->name('admin.author.delete-form');

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

	Route::get( '/character/edit/{id}', function ($id) {
		$user = Auth::guard('admin')->user();

		$character = \App\Character::find($id);

		return view('admin.pages.characters.edit', ['user' => $user, 'character' => $character]);
	})->name('admin.character.edit');

	Route::get( '/character/create', function () {
		$user = Auth::guard('admin')->user();

		return view('admin.pages.characters.create', ['user' => $user]);
	})->name('admin.character.create');

	Route::get( '/author/edit/{id}', function ($id) {
		$user = Auth::guard('admin')->user();

		$author = \App\Author::find($id);

		return view('admin.pages.authors.edit', ['user' => $user, 'author' => $author]);
	})->name('admin.author.edit');

	Route::get( '/author/create', function () {
		$user = Auth::guard('admin')->user();

		return view('admin.pages.authors.create', ['user' => $user]);
	})->name('admin.author.create');

});