<?php

Route::prefix('elderly')->group(function() {
	Route::home('elderly');
	Route::login('elderly');
	Route::dashboard('elderly');
	Route::dashboardUser('elderly');
	Route::dashboardOrders('elderly');
	Route::dashboardOrderDetails('elderly');
	Route::category('elderly');
	Route::product('elderly');
	Route::wishlist('elderly');
	Route::cart('elderly');
	Route::checkout('elderly');
	Route::register('elderly');
	Route::order('elderly');
	Route::help('elderly');
	Route::results('elderly');
	Route::contact('elderly');
	Route::about('elderly');
});