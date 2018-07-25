<?php

namespace App\Http\Controllers;

use App\Notifications\OrderSuccess;
use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;
use Notification;
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

		/*if(!empty($wishlist)){
			Notification::route('mail', $email)->notify(new Wishlist($wishlist));
		}*/

		$age = Session::get('ageGroup');
		return redirect($age . '/wishlist');
	}

	public function sendOrderSuccessMail() {
		$email = Auth::user()->email;
		$user = Auth::user();

		Notification::route('mail', $email)->notify(new OrderSuccess());

	}

	public function sendOrderConfirmationMail($approval_mail, $order_id) {
		$email = $approval_mail;

		Mail::send('mail.mails.order-confirmation', ['email' => $email, 'order_id' => $order_id], function ($message) use ($email)
		{

			$message->from('info@bookster.service', 'Bookster');

			$message->to($email);

		});

	}

	public function sendOrderSavedMail() {
		$email = Auth::user()->email;

		Mail::send('mail.mails.order-saved', ['email' => $email], function ($message) use ($email)
		{

			$message->from('info@bookster.service', 'Bookster');

			$message->to($email);

		});

	}

	public function sendOrderSuccessfullyConfirmedMail($email) {
		Mail::send('mail.mails.order-successfully-confirmed', ['email' => $email], function ($message) use ($email)
		{

			$message->from('info@bookster.service', 'Bookster');

			$message->to($email);

		});

	}
}
