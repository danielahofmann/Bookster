<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     */
	protected function redirectTo()
	{
		if(Session::has('ageGroup')){
			$path = '/' . Session::get( 'ageGroup' ) .'/dashboard';
		}

		return $path;
	}

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

	public function showResetForm(Request $request, $token = null) {
    	if(Session::has('ageGroup')){
    		$view = 'age-layouts.' . Session::get('ageGroup') . '.reset';
	    }else{
		    $view = 'age-layouts.default.reset';
	    }
		return view($view)
			->with(['token' => $token, 'email' => $request->email]);
	}
}
