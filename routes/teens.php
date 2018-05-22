<?php

Route::prefix('teens')->group(function() {
	Route::get( '/', function () {
		return view('age-layouts.teens.home');
	} );
});