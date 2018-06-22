<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
	/**
	 * Get the product records associated with the character.
	 */
	public function products()
	{
		return $this->hasMany('App\Product');
	}

	/**
	 * Get Image record associated with author
	 */
	public function character_image(  ) {
		return $this->hasOne('App\CharacterImage');
	}
}
