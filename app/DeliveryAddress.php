<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{

	/**
	 * Get the Order record associated with the delivery address.
	 */
	public function order()
	{
		return $this->belongsTo('App\Order');
	}
}
