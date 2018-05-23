<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
	/**
	 * Get the product records associated with the genre.
	 */
	public function products()
	{
		return $this->hasMany('App\Product');
	}
}
