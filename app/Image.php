<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	/**
	 * Get the product record associated with the image.
	 */
	public function product()
	{
		return $this->belongsTo('App\Product');
	}
}
