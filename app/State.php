<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
	/**
	 * Get the order records associated with the state.
	 */
	public function orders()
	{
		return $this->hasMany('App\Order');
	}
}
