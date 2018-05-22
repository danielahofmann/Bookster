<?php

Route::prefix('seniors')->group(function() {
	Route::get( '/', function () {
		return view('age-layouts.seniors.home');
	} );
});