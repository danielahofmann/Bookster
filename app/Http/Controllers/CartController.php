<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

	/**
	 * @param $id
	 *
	 * @param  Request  $request
	 * @return array
	 */
	public function saveProductToCart(Request $request, $id) {
		$product = Product::find($id);
		$oldCart = Session::has('cart') ? Session::get('cart') : null;

		$cart = new Cart($oldCart);
		$cart->add($product, $product->id);

		$request->session()->put('cart', $cart);

		$session_data = [
			'cart' => session('cart'),
		];

		return $session_data;
	}

	/**
	 * @param $id
	 * @param  Request  $request
	 * @return array
	 */
	public function deleteProductFromCart(Request $request, $id) {
		$product = Product::find($id);
		$oldCart = Session::has('cart') ? Session::get('cart') : null;

		$cart = new Cart($oldCart);
		$cart->delete($product, $id);

		$request->session()->put('cart', $cart);

		$session_data = [
			'cart' => session('cart'),
		];

		return $session_data;
	}

	public function decreaseProductQuantity(Request $request, $id) {
		$product = Product::find($id);
		$oldCart = Session::has('cart') ? Session::get('cart') : null;

		$cart = new Cart($oldCart);
		$cart->decrease($product, $id);

		$request->session()->put('cart', $cart);

		$session_data = [
			'cart' => session('cart'),
		];

		return $session_data;
	}
}
