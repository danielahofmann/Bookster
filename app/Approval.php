<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'customer_id', 'order_id', 'email', 'confirmed'
	];

	public function order()
	{
		return $this->belongsTo('App\Order');
	}

	public function customer()
	{
		return $this->belongsTo('App\Customer');
	}
}
