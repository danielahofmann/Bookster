<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillAddress extends Model
{
	/**
	 * Get the Order record associated with the billaddress.
	 */
	public function order()
	{
		return $this->belongsTo('App\Order');
	}
}
