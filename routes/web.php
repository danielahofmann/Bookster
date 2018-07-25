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

use Illuminate\Http\Request;


Route::get('/', function () {
    return view('pages.age');
})->name('start');

Auth::routes();

Route::post('/logout','CustomerController@performLogout')->name('logout');
Route::post('/saveCustomerData', 'CustomerController@store')->name('saveCustomerData');
Route::post('/place-order','OrderController@store')->name('place-order');
Route::post('/saveBillAddress', 'BillAddressController@saveBillAddressToSession')->name('saveBillAddress');
Route::post('/saveDeliveryAddress', 'DeliveryAddressController@saveDeliveryAddressToSession')->name('saveDeliveryAddress');
Route::get('/confirmation/{id}', 'ApprovalController@confirm')->name('confirmation');
Route::post('/sendWishlist', 'EmailController@sendWishlist');
Route::post('/updateUserData', 'UserController@update')->name('saveUserData');


Route::get('/confirmation-success', function () {
	return view('age-layouts.default.confirmation');
})->name('confirmation-success');

Route::get('/redirect', function(){
	return back();
})->name('redirect');


/**
 * API Routes
 */
Route::prefix('api')->group(function() {

	/**
	 * AgeController
	 */
	Route::get( '/saveAgeToSession', 'AgeController@saveAgeToSession' );

	/**
	 * SearchController
	 */
	Route::post( '/search', 'SearchController@search' )->name( 'search' );

	/**
	 * ProductController
	 */
	Route::get( '/getNewBestsellers', 'ProductController@getNewBestsellers' );
	Route::get( '/getNewBestsellersForKids', 'ProductController@getNewBestsellersForKids' );
	Route::get( '/getNovelties', 'ProductController@getNovelties' );
	Route::get( '/getKidsNovelties', 'ProductController@getKidsNovelties' );
	Route::get( '/getProductsOfGenre/{id}', 'ProductController@getProductsOfGenre' );
	Route::get( '/getProductsOfCategory/{id}', 'ProductController@getProductsOfCategory' );
	Route::get( '/getProductsOfAuthor/{id}', 'ProductController@getProductsOfAuthor' );
	Route::get( '/filterProducts', 'ProductController@filterProducts' );

	/**
	 * CategoryController
	 */
	Route::get( '/getCategories', 'CategoryController@index' );
	Route::get( '/getGenresAndRedirect/{id}', 'CategoryController@getGenresAndRedirect' );

	/**
	 * CharacterController
	 */
	Route::get( '/getCharacters', 'CharacterController@getCharactersForKids' );

	/**
	 * AuthorController
	 */
	Route::get( '/getAuthors', 'AuthorController@getAuthors' );

	/**
	 * GenreController
	 */
	Route::get( '/getGenres/{id}', 'GenreController@getGenreOfCategory' );
	Route::get( '/setGenreIdSession/{id}', 'GenreController@setGenreId' );

	/**
	 * WishlistController
	 */
	Route::get( '/saveProductToSessionWishlist/{id}', 'WishlistController@saveProductToSessionWishlist' );
	Route::get( '/deleteProductFromSessionWishlist/{id}', 'WishlistController@deleteProductFromSessionWishlist' );
	Route::get( '/getWishlistQuantity', 'WishlistController@getWishlistQuantity' );

	/**
	 * CartController
	 */
	Route::get( '/saveProductToCart/{id}', 'CartController@saveProductToCart' );
	Route::get( '/deleteProductFromCart/{id}', 'CartController@deleteProductFromCart' );
	Route::get( '/decreaseProductQuantityInCart/{id}', 'CartController@decreaseProductQuantity' );
	Route::get( '/getCartQuantity', 'CartController@getCartQuantity' );

	/**
	 * set checkout to 1/true, so after the user logged in successfully,
	 * redirectTo will check, if checkout is true and if so, it will redirect to order view.
	 * If this check would fail, the user would be redirected to dashboard, which we don't want
	 * in this case.
	 */
	Route::get( '/saveCheckoutToSession', function () {
		session( [ 'checkout' => 1 ] );

		$ageGroup = \Illuminate\Support\Facades\Session::get( 'ageGroup' );

		return $ageGroup;
	} );
});