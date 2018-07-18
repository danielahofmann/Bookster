<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	/**
	 * Get the customer record associated with the order.
	 */
	public function customer()
	{
		return $this->belongsTo('App\Customer');
	}

	/**
	 * Get the state record associated with the order.
	 */
	public function state()
	{
		return $this->belongsTo('App\State');
	}

	/**
	 * Get the product records associated with the order.
	 */
	public function products()
	{
		return $this->belongsToMany('App\Product');
	}

	public function billAddress()
	{
		return $this->hasOne('App\BillAddress');
	}

	public function deliveryAddress()
	{
		return $this->hasOne('App\DeliveryAddress');
	}

	public function approval()
	{
		return $this->hasOne('App\Approval');
	}
}
