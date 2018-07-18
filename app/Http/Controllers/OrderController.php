<?php

namespace App\Http\Controllers;

use App\BillAddress;
use App\Cart;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
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
	    /**
	     * First of all validating
	     */
    	$this->validate($request, [
		    'delivery' => 'required',
		    'payment' => 'required',
		    'agb' => 'required',
	    ], [
		    'delivery.required' => 'Bitte wähle eine Versandoption.',
		    'payment.required' => 'Bitte wähle eine Zahlungsmethode.',
		    'agb.required' => 'Für den erfolgreichen Abschluss der Bestellung, müssen unsere AGB akzeptiert werden.',
	    ]);

    	/**
    	 * Then saving billAddress and deliveryAddress
	     * If session::has('deliveryAddress/billAddress') -> save this data, otherwise save data from Auth::user
    	 */
	    $billAddress = new BillAddressController();
	    $billId = $billAddress->store();

	    $deliveryAddress = new BillAddressController();
	    $deliveryId = $deliveryAddress->store();

	    /**
	     * Now save all data to order db
	     */
	    $order = new Order();
	    $order->customer_id = Auth::user()->id;
	    $order->billAddress_id = $billId;
	    $order->deliveryAddress_id = $deliveryId;
	    $order->state_id = 1;
	    $order->agb = $request->input('agb');
	    $order->shipping_method = $request->input('delivery');
	    $order->payment_method = $request->input('payment');
		$order->ordered_at = Carbon::now();
		$order->created_at = Carbon::now();

	    $oldCart = Session::get('cart');
	    $cart = new Cart($oldCart);

	    /**
	     * Calculating TotalPrice from deliveryPrice and $cart->totalprice
	     */
	    if($request->input('delivery') == 'standard'){
		    $deliveryPrice = 5.00;
	    }else{
		    $deliveryPrice = $cart->totalPrice + 8.00;
	    }

	    $total = $cart->totalPrice + $deliveryPrice;
	    $order->price = $total;

	    $order->save();

	    /**
	     * saving to pivot order_product with product_amount
	     */
	    foreach ($cart->items as $product){
	    	$order->products()->attach($product['item']['id'], ['product_amount' => $product['quantity']]);
	    }

	    /**
	     * Send email, that the order was successfully placed
	     */
	    $email = new EmailController();
	    $email->sendOrderSuccessMail($cart->items);

	    /**
	     * delete all data from session, that now isn't needed any longer
	     */
	    Session::forget(['billAddress', 'deliveryAddress', 'cart']);

	    /**
	     * redirect with status
	     */

	    $ageGroup = Session::get('ageGroup');
	    return redirect()
		    ->route($ageGroup . '-order-success')
		    ->with('status', 'Bestellung erfolgreich erstellt');
	}

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
