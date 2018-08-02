<?php

Route::group(['middleware' => 'App\Http\Middleware\KidsMiddleware', 'prefix' => 'kids'], function() {
	Route::home('kids');
	Route::category('kids');
	Route::product('kids');
	Route::wishlist('kids');
	Route::results('kids');
	Route::sendWishlist('kids');
	Route::imprint('kids');
});