<?php

namespace App\Http\Controllers;

use App\Notifications\Confirmation;
use App\Notifications\ConfirmationSuccess;
use App\Notifications\Order;
use App\Notifications\OrderSaved;
use App\Notifications\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EmailController extends Controller
{
	public function sendWishlist(Request $request) {
		$email = $request->input('email');

		$wishlist = Session::get('wishlist');

		if(!empty($wishlist)){

			Notification::route('mail', $email)->notify(new Wishlist($wishlist,  route('start')));
		}

		$age = Session::get('ageGroup');
		return redirect($age . '/wishlist');
	}

	public function sendOrderSuccessMail($order) {
		$email = Auth::user()->email;

		Notification::route('mail', $email)->notify(new Order($order));

	}

	public function sendOrderConfirmationMail($approval_mail, $order_id) {
		$email = $approval_mail;

		Notification::route('mail', $email)->notify(new Confirmation($order_id));

	}

	public function sendOrderSavedMail() {
		$email = Auth::user()->email;

		Notification::route('mail', $email)->notify(new OrderSaved());

	}

	public function sendOrderSuccessfullyConfirmedMail($email) {
		Notification::route('mail', $email)->notify(new ConfirmationSuccess());
	}
}
