<?php

namespace App\Http\Controllers;

use App\BillAddress;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
	    $this->validate($request, [
		    'delivery' => 'required',
		    'payment' => 'required',
		    'agb' => 'required',
	    ], [
		    'delivery.required' => 'Bitte wähle eine Versandoption.',
		    'payment.required' => 'Bitte wähle eine Zahlungsmethode.',
		    'agb.required' => 'Für den erfolgreichen Abschluss der Bestellung, müssen unsere AGB akzeptiert werden.',
	    ]);

	    $billAddress = new BillAddress();
	    $billAddress->save();

	    $order = new Order();
	    $order->agb = $request->input('agb');
	    $order->delivery = $request->input('delivery');
	    $order->payment = $request->input('payment');
	    $order->state_id = 1;
	    $order->customer_id = Auth::user()->id;



	    $product->save();

	    return redirect()
		    ->route('products')
		    ->with('status', 'Produkt erfolgreich erstellt');

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
