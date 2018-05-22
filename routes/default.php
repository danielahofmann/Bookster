<?php

Route::prefix('default')->group(function() {
	Route::get( '/', function () {
		return view('age-layouts.default.home');
	} );
});