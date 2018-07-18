<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
	public function order()
	{
		return $this->hasOne('App\Order');
	}
}
