<?php

Route::prefix('teens')->group(function() {
	Route::home('teens');
	Route::login('teens');
	Route::dashboard('teens');
	Route::dashboardUser('teens');
	Route::dashboardOrders('teens');
	Route::dashboardOrderDetails('teens');
	Route::category('teens');
	Route::product('teens');
	Route::wishlist('teens');
	Route::cart('teens');
	Route::checkout('teens');
	Route::register('teens');
	Route::order('teens');
	Route::help('teens');
	Route::results('teens');
	Route::contact('teens');
	Route::about('teens');
});