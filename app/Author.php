<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
	/**
	 * Get the product records associated with the author.
	 */
	public function products()
	{
		return $this->hasMany('App\Product');
	}
}
