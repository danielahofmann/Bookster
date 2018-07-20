<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect customers after login.
     */

	protected function redirectTo()
	{
		if(Session::has('checkout') && Session::get('checkout') == 1){
			$path = '/' . Session::get('ageGroup') . '/order';
			return $path;
		}

		if(Session::has('ageGroup')){
			if(Session::get('ageGroup') == 'kids' || Session::get('ageGroup') == 'toddlers' ){
					$path = '/' . Session::get('ageGroup');
			} else {
				$path = '/' . Session::get( 'ageGroup' ) . '/dashboard';
			}
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
        $this->middleware('guest')->except('logout');
    }
}
