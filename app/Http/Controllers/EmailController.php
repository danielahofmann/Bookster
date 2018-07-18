<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;
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

		$age = Session::get('ageGroup');
		return redirect($age . '/wishlist');
	}

	public function sendOrderSuccessMail(Array $products) {
		$email = Auth::user()->email;

		Mail::send('mail.mails.order-success', ['email' => $email, 'products' => $products], function ($message) use ($email)
		{

			$message->from('info@bookster.service', 'Bookster');

			$message->to($email);

		});

	}
}
