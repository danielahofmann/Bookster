<?php

namespace App;

use http\Env\Request;
use Illuminate\Support\Facades\Session;

class WishlistSession
{
	public $items = null;
	public $totalQuantity = 0;

	public function __construct($oldWishlist) {
		if($oldWishlist){
			$this->items = $oldWishlist->items;
			$this->totalQuantity = $oldWishlist->totalQuantity;
		}
	}

	public function add($item, $id) {
		$storedItem = ['quantity' => 0, 'item' => $item];
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$storedItem = $this->items[$id];
			}
		}

		$storedItem['quantity']++;
		$this->items[$id] = $storedItem;
		$this->totalQuantity++;
	}

	public function delete($id) {
		if(array_key_exists($id, $this->items)){
			unset($this->items[$id]);
		}
		$this->totalQuantity--;

		if($this->totalQuantity < 1){
			Session::forget('wishlist');
		}
	}


}