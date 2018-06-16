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

	/**
	 * Get the author record associated with the product.
	 */
	public function category()
	{
		return $this->belongsTo('App\Category');
	}
}
