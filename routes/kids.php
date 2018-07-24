<?php

Route::prefix('kids')->group(function() {
	Route::home('kids');
	Route::category('kids');
	Route::product('kids');
	Route::wishlist('kids');
	Route::results('kids');
	Route::sendWishlist('kids');
});