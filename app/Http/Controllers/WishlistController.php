<?php

namespace App\Http\Controllers;

use App\Wishlist;
use App\WishlistSession;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $age = Session::get('ageGroup');

    	if(!Session::has('wishlist')){
		    return view('age-layouts.'. $age . '.wishlist', ['products' => null]);
	    }

	    $oldWishlist = Session::get('wishlist');
	    $wishlist = new WishlistSession($oldWishlist);

	    return view('age-layouts.' . $age . '.wishlist', ['products' => $wishlist->items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wishlist $wishlist)
    {
        //
    }

	/**
	 * @param $id
	 *
	 * @param  Request  $request
	 * @return array
	 */
	public function saveProductToSessionWishlist(Request $request, $id) {
		$product = Product::find($id);
		$oldWishlist = Session::has('wishlist') ? Session::get('wishlist') : null;

		$wishlist = new WishlistSession($oldWishlist);
		$wishlist->add($product, $product->id);

		$request->session()->put('wishlist', $wishlist);

		$session_data = [
			'wishlist' => session('wishlist'),
		];

		return $session_data;
    }

    /**
	 * @param $id
	 *
	 * @param  Request  $request
	 * @return array
	 */
	public function deleteProductFromSessionWishlist(Request $request, $id) {
		$oldWishlist = Session::has('wishlist') ? Session::get('wishlist') : null;

		$wishlist = new WishlistSession($oldWishlist);
		$wishlist->delete($id);

		$request->session()->put('wishlist', $wishlist);

		$session_data = [
			'wishlist' => session('wishlist'),
		];

		return $session_data;
    }
}
