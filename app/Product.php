<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
	use Searchable;


	/**
	 * Get the author record associated with the product.
	 */
	public function author()
	{
		return $this->belongsTo('App\Author');
	}

	/**
	 * Get the character record associated with the product.
	 */
	public function character()
	{
		return $this->belongsTo('App\Character');
	}

	/**
	 * Get the category record associated with the product.
	 */
	public function category()
	{
		return $this->belongsTo('App\Category');
	}

	/**
	 * Get the genre record associated with the product.
	 */
	public function genre()
	{
		return $this->belongsTo('App\Genre');
	}

	/**
	 * Get the image records associated with the product.
	 */
	public function image()
	{
		return $this->hasMany('App\Image');
	}

	/**
	 * Get the order records associated with the product.
	 */
	public function orders()
	{
		return $this->belongsToMany('App\Order');
	}

	/**
	 * Get the user record associated with the product.
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	/**
	 * Get the wishlist records associated with the product.
	 */
	public function wishlists()
	{
		return $this->hasMany('App\Wishlist');
	}
}
