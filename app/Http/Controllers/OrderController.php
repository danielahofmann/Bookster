<?php

namespace App\Http\Controllers;

use App\Approval;
use App\BillAddress;
use App\Cart;
use App\DeliveryAddress;
use App\Order;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
	    $user = Auth::guard('admin')->user();

	    $orders = \App\Order::with('state')
	                        ->with('approval')
	                        ->with('customer')
	                        ->orderBy('created_at', 'DESC')
	                        ->get();

	    return view('admin.pages.orders', ['user' => $user, 'orders' => $orders]);
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

	    $deliveryAddress = new DeliveryAddressController();
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
		    $deliveryPrice = 8.00;
	    }

	    $total = $cart->totalPrice + $deliveryPrice;
	    $order->price = $total;

	    /**
	     * Saving Order
	     */
	    $order->save();

	    /**
	     * If ageGroup = teens, we need a approval
	     */
	    if(Session::get('ageGroup') == 'teens'){
		    $approval = $order->approval()->create([
			    'customer_id' => Auth::user()->id,
			    'email' => $request->input('approval_mail'),
		    ]);
	    }

	    /**
	     * saving to pivot order_product with product_amount
	     */
	    foreach ($cart->items as $product){
	    	$order->products()->attach($product['item']['id'], ['product_amount' => $product['quantity']]);
	    }

	    if(Session::get('ageGroup') == 'teens'){
		    /**
		     * Send email to parents, that a order was placed and needs to be confirmed
		     */
		    $email = new EmailController();
		    $email->sendOrderConfirmationMail($request->input('approval_mail'), $order->id);

		    /**
		     * Send email, that the order is saved and needs confirmation
		     */
		    $email = new EmailController();
		    $email->sendOrderSavedMail();
	    }else{
		    /**
		     * Send email, that the order was successfully placed
		     */
		    $email = new EmailController();
		    $email->sendOrderSuccessMail($cart->items);
	    }


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
    public function show(Order $order, $id)
    {
	    $user = Auth::guard('admin')->user();

	    $order = \App\Order::where('id', $id)
	                       ->with('state')
	                       ->with('products')
	                       ->with('approval')
	                       ->with('customer')
	                       ->first();

	    $states = \App\State::all();

	    $billAddress = \App\BillAddress::find($order->billAddress_id);
	    $deliveryAddress = \App\DeliveryAddress::find($order->deliveryAddress_id);

	    return view('admin.pages.order', ['order' => $order, 'user' => $user, 'bill' => $billAddress, 'delivery' => $deliveryAddress, 'states' => $states]);
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
    public function update(Request $request, $id)
    {
    	$order = Order::find($id);

        if ($request->has('state')){
			$order->state_id = $request->get('state');
        }

        if($request->has('send_at')){
        	$order->send_at = $request->get('send_at');
        }

        $order->save();

	    return redirect()
		    ->back()
		    ->with('status', 'Bestellung erfolgreich bearbeitet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order, $id)
    {
	    $order = Order::find($id);

	    /**
	     * First of all detaching products from order, then also deleting approval
	     */
	    DB::delete('delete from order_product where order_id = ?', array($order->id));

	    $order->approval()->delete();

	    /**
	     * Deleting Delivery/BillAddress of Order, where order_id is id
	     */
	    $delivery = DeliveryAddress::find($order->deliveryAddress_id);
	    $delivery->delete();

	    $bill = BillAddress::find($order->billAddress_id);
	    $bill->delete();

	    $order->delete();

	    return redirect()
	    ->route('admin.orders')
	    ->with('status', 'Bestellung erfolgreich gelöscht!');
    }
}
