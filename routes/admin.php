<?php
Route::prefix('admin')->group(function() {
	Route::get( '/login', function () {
		return view( 'admin.pages.login' );
	})->name( 'admin-login' );
});