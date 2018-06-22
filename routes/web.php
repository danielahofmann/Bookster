<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Genre;

Route::get('/', function () {
    return view('pages.age');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/api/saveAgeToSession', 'AgeController@saveAgeToSession');

Route::get('/api/search', 'SearchController@search');

Route::get('/api/getCategories', 'CategoryController@index');
Route::get('/api/getNewBestsellers', 'ProductController@getNewBestsellers');
Route::get('/api/getNovelties', 'ProductController@getNovelties');
Route::get('/api/getKidsNovelties', 'ProductController@getKidsNovelties');
Route::get('/api/getAuthors', 'AuthorController@getAuthors');
Route::get('/api/getGenres/{id}', 'GenreController@getGenreOfCategory');

Route::get('/results', function () {
	return view('pages.results');
});

