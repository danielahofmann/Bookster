<?php

Route::group(['middleware' => 'App\Http\Middleware\SeniorsMiddleware', 'prefix' => 'seniors'], function() {
	Route::home('seniors');
	Route::login('seniors');
	Route::category('seniors');
	Route::author('seniors');
	Route::product('seniors');
	Route::wishlist('seniors');
	Route::cart('seniors');
	Route::checkout('seniors');
	Route::register('seniors');
	Route::help('seniors');
	Route::results('seniors');
	Route::contact('seniors');
	Route::about('seniors');
	Route::imprint('seniors');

	Route::group(['middleware' => 'auth'], function() {
		Route::dashboard( 'seniors' );
		Route::dashboardUser( 'seniors' );
		Route::dashboardOrders( 'seniors' );
		Route::dashboardOrderDetails('seniors');
		Route::order('seniors');
	});
});