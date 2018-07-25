<?php

Route::group(['middleware' => 'App\Http\Middleware\TeensMiddleware', 'prefix' => 'teens'], function() {
	Route::home('teens');
	Route::login('teens');
	Route::category('teens');
	Route::author('teens');
	Route::product('teens');
	Route::wishlist('teens');
	Route::cart('teens');
	Route::checkout('teens');
	Route::register('teens');
	Route::help('teens');
	Route::results('teens');
	Route::contact('teens');
	Route::about('teens');

	Route::group(['middleware' => 'auth'], function() {
		Route::dashboard( 'teens' );
		Route::dashboardUser( 'teens' );
		Route::dashboardOrders( 'teens' );
		Route::dashboardOrderDetails('teens');
		Route::order('teens');
	});
});