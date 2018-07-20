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

Route::get('/api/saveAgeToSession', 'AgeController@saveAgeToSession');

Route::post('/api/search', 'SearchController@search')->name('search');

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
Route::get('/api/deleteProductFromSessionWishlist/{id}', 'WishlistController@deleteProductFromSessionWishlist');

Route::post('/sendWishlist', 'EmailController@sendWishlist');

Route::get('/api/saveProductToCart/{id}', 'CartController@saveProductToCart');
Route::get('/api/deleteProductFromCart/{id}', 'CartController@deleteProductFromCart');
Route::get('/api/decreaseProductQuantityInCart/{id}', 'CartController@decreaseProductQuantity');


Route::get('/api/saveCheckoutToSession', function(){

	session(['checkout' => 1]);

	$ageGroup = \Illuminate\Support\Facades\Session::get('ageGroup');

	return $ageGroup;
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

Route::post('/logout','UserController@performLogout')->name('logout');

Route::post('/place-order','OrderController@store')->name('place-order');

Route::post('/saveBillAddress',function(Request $request){

	$bill = [
		'firstname' => $request->input('firstname'),
		'lastname' => $request->input('lastname'),
		'street' => $request->input('street'),
		'housenum' => $request->input('housenum'),
		'city' => $request->input('city'),
		'postcode' => $request->input('postcode'),
		'email' => $request->input('email'),
	];

	session(['billAddress' => $bill]);

	return redirect()
		->back()
		->with('status', 'Rechnungsadresse erfolgreich geändert');

})->name('saveBillAddress');

Route::post('/saveDeliveryAddress',function(Request $request){

	$delivery = [
		'firstname' => $request->input('firstname'),
		'lastname' => $request->input('lastname'),
		'street' => $request->input('street'),
		'housenum' => $request->input('housenum'),
		'city' => $request->input('city'),
		'postcode' => $request->input('postcode'),
		'email' => $request->input('email'),
	];

	session(['deliveryAddress' => $delivery]);

	return redirect()
		->back()
		->with('status', 'Versandadresse erfolgreich geändert');

})->name('saveDeliveryAddress');

Route::post('/saveCustomerData', 'CustomerController@store')->name('saveCustomerData');

Route::get('/confirmation/{id}', 'ApprovalController@confirm')->name('confirmation');

Route::get('/confirmation-success', function () {
	return view('age-layouts.default.confirmation');
})->name('confirmation-success');