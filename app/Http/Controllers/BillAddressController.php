<?php

namespace App\Http\Controllers;

use App\BillAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BillAddressController extends Controller
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
		    $bill = Session::get('billAddress');

		    $billAddress = new BillAddress();
		    $billAddress->firstname = $bill['firstname'];
		    $billAddress->lastname = $bill['lastname'];
		    $billAddress->street = $bill['street'];
		    $billAddress->housenum = $bill['housenum'];
		    $billAddress->city = $bill['city'];
		    $billAddress->postcode = $bill['postcode'];
		    $billAddress->email = $bill['email'];
		    $billAddress->save();
	    }else{
		    $billAddress = new BillAddress();
		    $billAddress->firstname = Auth::user()->firstname;
		    $billAddress->lastname =  Auth::user()->lastname;
		    $billAddress->street =  Auth::user()->street;
		    $billAddress->housenum =  Auth::user()->housenum;
		    $billAddress->city =  Auth::user()->city;
		    $billAddress->postcode =  Auth::user()->postcode;
		    $billAddress->email =  Auth::user()->email;
		    $billAddress->save();
	    }

	    return $billAddress->id;
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
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 *
	 * Changing BillAddress when ordering, saving it to session
	 */
	public function saveBillAddressToSession(Request $request) {
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
    }
}
