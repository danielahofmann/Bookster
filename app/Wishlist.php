<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
	/**
	 * Get the product record associated with the wishlist.
	 */
	public function product()
	{
		return $this->belongsTo('App\Product');
	}

	/**
	 * Get the customer record associated with the wishlist.
	 */
	public function customer()
	{
		return $this->belongsTo('App\Customer');
	}
}
