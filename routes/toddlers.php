<?php

Route::prefix('toddlers')->group(function() {
	Route::get( '/', function () {
		return view('age-layouts.toddlers.home');
	} );
});