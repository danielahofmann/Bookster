<?php

Route::prefix('elderly')->group(function() {
	Route::get( '/', function () {
		return view('age-layouts.elderly.home');
	} );
});