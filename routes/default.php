<?php

Route::group(['middleware' => 'App\Http\Middleware\DefaultMiddleware', 'prefix' => 'default'], function() {
	Route::home('default');
	Route::login('default');
	Route::dashboard('default');
	Route::dashboardUser('default');
	Route::dashboardOrders('default');
	Route::dashboardOrderDetails('default');
	Route::category('default');
	Route::product('default');
	Route::wishlist('default');
	Route::cart('default');
	Route::checkout('default');
	Route::register('default');
	Route::order('default');
	Route::help('default');
	Route::results('default');
	Route::contact('default');
	Route::about('default');
});
