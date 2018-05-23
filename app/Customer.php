<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * Get the order records associated with the customer.
	 */
	public function orders()
	{
		return $this->hasMany('App\Order');
	}

	/**
	 * Get the wishlist records associated with the customer.
	 */
	public function wishlists()
	{
		return $this->hasMany('App\Wishlist');
	}
}
