<?php

Route::prefix('toddlers')->group(function() {
	Route::get( '/', function () {
		return view('age-layouts.toddlers.home');
	} );

	Route::get( '/category/{category_id}', function ($category_id) {
		$category = App\Category::find($category_id);
		$genres = App\Genre::where('category_id', $category_id)->get();

		$filterCategory = function($query) use ($category_id) {
			$query->where('category_id', $category_id);
		};

		$authors = App\Author::whereHas('categories', $filterCategory)->with(['categories' => $filterCategory])->get();

		return view('age-layouts.toddlers.category', ['category' => $category, 'genres' => $genres, 'authors' => $authors]);
	});
});