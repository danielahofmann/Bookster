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
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('pages.age');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/api/saveAgeToSession', 'AgeController@saveAgeToSession');

Route::get('/api/search', 'SearchController@search');

Route::get('/api/getCategories', 'CategoryController@index');
Route::get('/api/getCharacters', 'CharacterController@getCharactersForKids');
Route::get('/api/getNewBestsellers', 'ProductController@getNewBestsellers');
Route::get('/api/getNewBestsellersForKids', 'ProductController@getNewBestsellersForKids');
Route::get('/api/getNovelties', 'ProductController@getNovelties');
Route::get('/api/getKidsNovelties', 'ProductController@getKidsNovelties');
Route::get('/api/getAuthors', 'AuthorController@getAuthors');
Route::get('/api/getGenres/{id}', 'GenreController@getGenreOfCategory');
Route::get('/api/getProductsOfGenre/{id}', 'ProductController@getProductsOfGenre');
Route::get('/api/getProductsOfCategory/{id}', 'ProductController@getProductsOfCategory');
Route::get('/api/getProductsOfAuthor/{id}', 'ProductController@getProductsOfAuthor');
Route::get('/api/filterProducts', 'ProductController@filterProducts');
Route::get('/api/saveProductToSessionWishlist/{id}', 'WishlistController@saveProductToSessionWishlist');
Route::get('/api/saveProductToCart/{id}', 'CartController@saveProductToCart');


Route::get('/results', function () {
	return view('pages.results');
});

Route::get('/redirect', function(){
	return back();
})->name('redirect');

Route::get('/api/getGenresAndRedirect/{id}', function($id){
	$category = App\Category::find($id);
	return redirect('/', 301);
});

Route::get('/api/getWishlistQuantity', function(Request $request){
	$data = $request->session()->get('wishlist');

	if(!empty($data)){
		$quantity = $data->totalQuantity;
	}else{
		$quantity = 0;
	}
	return $quantity;
});

Route::get('/api/getCartQuantity', function(Request $request){
	$data = $request->session()->get('cart');

	if(!empty($data)){
		$quantity = $data->totalQuantity;
	}else{
		$quantity = 0;
	}
	return $quantity;
});




