<?php

Route::prefix( 'admin' )->group( function () {
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

	Route::group(['middleware' => 'auth:admin'], function() {
		Route::post( 'logout/', 'Auth\AdminLoginController@logout' )->name( 'admin.logout' );
		Route::get( '/', 'HomeController@indexAdmin' )->name( 'admin.dashboard' );

		/**
		 * Products Routes
		 */
		Route::get( '/products', 'ProductController@index' )->name( 'admin.products' );
		Route::get( '/product/create', 'ProductController@create' )->name( 'admin.product.create' );
		Route::post( '/product/store', 'ProductController@store' )->name( 'admin.product.store' );
		Route::get( '/product/edit/{id}', 'ProductController@edit' )->name( 'admin.product.edit' );
		Route::post( '/product/update/{id}', 'ProductController@update' )->name( 'admin.product.update' );
		Route::get( '/product/delete-form/{id}', 'ProductController@delete' )->name( 'admin.product.delete-form' );
		Route::delete( '/product/delete/{id}', 'ProductController@destroy' )->name( 'admin.product.delete' );

		/**
		 * Users/Employees Routes
		 */
		Route::get( '/users', 'UserController@indexUsers' )->name( 'admin.users' );

		/**
		 * Protecting Routes for Employees, because only Admins with Role 1 should be able to edit/create/delete users
		 */
		Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function() {
			Route::get( '/user/create', 'UserController@create' )->name( 'admin.user.create' );
			Route::post( '/user/store', 'UserController@store' )->name( 'admin.user.store' );
			Route::get( '/user/edit/{id}', 'UserController@edit' )->name( 'admin.user.edit' );
			Route::patch( '/user/update/{id}', 'UserController@updateEmployee' )->name( 'admin.user.update' );
			Route::get( '/user/delete-form/{id}', 'UserController@delete' )->name( 'admin.user.delete-form' );
			Route::delete( '/user/delete/{id}', 'UserController@destroy' )->name( 'admin.user.delete' );
		});

		/**
		 * Orders Routes
		 */
		Route::get( '/orders', 'OrderController@index' )->name( 'admin.orders' );
		Route::get( '/order/{id}', 'OrderController@show' )->name( 'admin.order' );
		Route::patch( '/order/update/{id}', 'OrderController@update' )->name( 'admin.order.update' );
		Route::delete( '/order/delete/{id}', 'OrderController@destroy' )->name( 'admin.order.delete' );

		/**
		 * Authors Routes
		 */
		Route::get( '/authors', 'AuthorController@index' )->name( 'admin.authors' );
		Route::get( '/author/create', 'AuthorController@create' )->name( 'admin.author.create' );
		Route::post( '/author/store', 'AuthorController@store' )->name( 'admin.author.store' );
		Route::get( '/author/edit/{id}', 'AuthorController@edit' )->name( 'admin.author.edit' );
		Route::post( '/author/update/{id}', 'AuthorController@update' )->name( 'admin.author.update' );
		Route::get( '/author/delete-form/{id}', 'AuthorController@delete' )->name( 'admin.author.delete-form' );
		Route::delete( '/author/delete/{id}', 'AuthorController@destroy' )->name( 'admin.author.delete' );

		/**
		 * Characters Routes
		 */
		Route::get( '/characters', 'CharacterController@index' )->name( 'admin.characters' );
		Route::get( '/character/create', 'CharacterController@create' )->name( 'admin.character.create' );
		Route::post( '/character/store', 'CharacterController@store' )->name( 'admin.character.store' );
		Route::get( '/character/edit/{id}', 'CharacterController@edit' )->name( 'admin.character.edit' );
		Route::post( '/character/update/{id}', 'CharacterController@update' )->name( 'admin.character.update' );
		Route::get( '/character/delete-form/{id}', 'CharacterController@delete' )->name( 'admin.character.delete-form' );
		Route::delete( '/character/delete/{id}', 'CharacterController@destroy' )->name( 'admin.character.delete' );
	});
});
