<?php

Route::group(['middleware' => 'App\Http\Middleware\DefaultMiddleware', 'prefix' => 'default'], function() {
	Route::home('default');
	Route::login('default');
	Route::category('default');
	Route::author('default');
	Route::product('default');
	Route::wishlist('default');
	Route::cart('default');
	Route::checkout('default');
	Route::register('default');
	Route::help('default');
	Route::results('default');
	Route::contact('default');
	Route::about('default');

	Route::group(['middleware' => 'auth'], function() {
		Route::dashboard( 'default' );
		Route::dashboardUser( 'default' );
		Route::dashboardOrders( 'default' );
		Route::dashboardOrderDetails('default');
		Route::order('default');
	});
});
