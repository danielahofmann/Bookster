<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class EmailController extends Controller
{
	public function sendWishlist(Request $request) {
		$email = $request->input('email');

		$wishlist = Session::get('wishlist');

		if(!empty($wishlist)){
			Mail::send('mail.sendWishlist', ['email' => $email, 'wishlist' => $wishlist], function ($message) use ($email)
			{

				$message->from('me@gmail.com', 'Bookster');

				$message->to($email);

			});
		}

		return response()->json(['message' => 'Request completed']);
	}
}
