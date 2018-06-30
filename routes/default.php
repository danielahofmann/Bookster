<?php

Route::prefix('default')->group(function() {
	Route::get( '/', function () {
		return view('age-layouts.default.home');
	})->name('default-home');

	Route::get( '/category/{category_id}', function ($category_id) {
		$category = App\Category::find($category_id);
		$genres = App\Genre::where('category_id', $category_id)->get();

		$filterCategory = function($query) use ($category_id) {
			$query->where('category_id', $category_id);
		};

		$authors = App\Author::whereHas('categories', $filterCategory)->with(['categories' => $filterCategory])->get();

		return view('age-layouts.default.category', ['category' => $category, 'genres' => $genres, 'authors' => $authors]);
	})->name('default-category');

	Route::get('/product/{id}', function ($id) {
		$product = App\Product::where('id', $id)
		                      ->with('image')
		                      ->with('author')
		                      ->with('category')
		                      ->with('genre')
		                      ->where('ebook', 0)
		                      ->get();

		return view('age-layouts.default.product', ['product' => $product]);
	})->name('default-product');
});