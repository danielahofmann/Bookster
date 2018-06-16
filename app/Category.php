<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	/**
	 * Get the product records associated with the author.
	 */
	public function products()
	{
		return $this->hasMany('App\Product');
	}

	/**
	 * Get the genre records associated with the category.
	 */
	public function genres()
	{
		return $this->hasMany('App\Genre');
	}
}
