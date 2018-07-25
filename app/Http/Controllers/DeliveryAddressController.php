<?php

namespace App\Http\Controllers;

use App\DeliveryAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DeliveryAddressController extends Controller
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
	public function store()
	{
		if(Session::has('billAddress')){
			$delivery = Session::get('deliveryAddress');

			$deliveryAddress = new DeliveryAddress();
			$deliveryAddress->firstname = $delivery['firstname'];
			$deliveryAddress->lastname = $delivery['lastname'];
			$deliveryAddress->street = $delivery['street'];
			$deliveryAddress->housenum = $delivery['housenum'];
			$deliveryAddress->city = $delivery['city'];
			$deliveryAddress->postcode = $delivery['postcode'];
			$deliveryAddress->email = $delivery['email'];
			$deliveryAddress->save();
		}else{
			$deliveryAddress = new DeliveryAddress();
			$deliveryAddress->firstname = Auth::user()->firstname;
			$deliveryAddress->lastname =  Auth::user()->lastname;
			$deliveryAddress->street =  Auth::user()->street;
			$deliveryAddress->housenum =  Auth::user()->housenum;
			$deliveryAddress->city =  Auth::user()->city;
			$deliveryAddress->postcode =  Auth::user()->postcode;
			$deliveryAddress->email =  Auth::user()->email;
			$deliveryAddress->save();
		}

		return $deliveryAddress->id;
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

	public function saveDeliveryAddressToSession(Request $request) {
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
    }
}
