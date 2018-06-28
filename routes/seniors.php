<?php

Route::prefix('seniors')->group(function() {
	Route::get( '/', function () {
		return view('age-layouts.seniors.home');
	})->name('seniors-home');

	Route::get( '/category/{category_id}', function ($category_id) {
		$category = App\Category::find($category_id);
		$genres = App\Genre::where('category_id', $category_id)->get();

		$filterCategory = function($query) use ($category_id) {
			$query->where('category_id', $category_id);
		};

		$authors = App\Author::whereHas('categories', $filterCategory)->with(['categories' => $filterCategory])->get();

		return view('age-layouts.seniors.category', ['category' => $category, 'genres' => $genres, 'authors' => $authors]);
	})->name('seniors-category');

	Route::get('/product/{id}', function ($id) {
		$product = App\Product::find($id);

		return view('age-layouts.seniors.product', ['product' => $product]);
	})->name('product');
});