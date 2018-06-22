<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CharacterImage extends Model
{
	/**
	 * Get the character record associated with the image.
	 */
	public function character()
	{
		return $this->belongsTo('App\Character');
	}
}
