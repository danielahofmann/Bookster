<?php

Route::group(['middleware' => 'App\Http\Middleware\SeniorsMiddleware', 'prefix' => 'seniors'], function() {
	Route::home('seniors');
	Route::login('seniors');
	Route::dashboard('seniors');
	Route::dashboardUser('seniors');
	Route::dashboardOrders('seniors');
	Route::dashboardOrderDetails('seniors');
	Route::category('seniors');
	Route::product('seniors');
	Route::wishlist('seniors');
	Route::cart('seniors');
	Route::checkout('seniors');
	Route::register('seniors');
	Route::order('seniors');
	Route::help('seniors');
	Route::results('seniors');
	Route::contact('seniors');
	Route::about('seniors');
});