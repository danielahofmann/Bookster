<?php

namespace App\Http\Controllers;

use App\Approval;
use App\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ApprovalController extends Controller
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

	public function confirm($order_id) {
    	//Find approval with the right order_id
		$approval = Approval::where('order_id', $order_id)->first();

		//update confirmed to true
		$approval->confirmed = true;
		$approval->updated_at = Carbon::now();
		$approval->save();

		/**
		 * get customer of approval
		 */
		$customer = Customer::find($approval->customer_id);

		/**
		 * Send email, that the order was successfully confirmed
		 */
		$email = new EmailController();
		$email->sendOrderSuccessfullyConfirmedMail($customer->email);

		return redirect()
			->route('confirmation-success')
			->with('status', 'Bestellung erfolgreich bestätigt');
    }
}
