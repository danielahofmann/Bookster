<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthorImage extends Model
{
	/**
	 * Get the author record associated with the image.
	 */
	public function author()
	{
		return $this->belongsTo('App\Author');
	}
}
