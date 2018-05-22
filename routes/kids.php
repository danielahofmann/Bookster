<?php

Route::prefix('kids')->group(function() {
	Route::get( '/', function () {
		return view('age-layouts.kids.home');
	} );
});