<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
	use Notifiable;

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
