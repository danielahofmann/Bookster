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

	/**
	 * Get Image record associated with author
	 */
	public function author_image(  ) {
		return $this->hasOne('App\AuthorImage');
	}

	public function categories() {
		return $this->belongsToMany('App\Category', 'authors_categories')->withTimestamps()->withPivot('category_id', 'author_id');
	}
}
