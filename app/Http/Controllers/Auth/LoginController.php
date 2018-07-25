<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
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
	 * If user is already logged in, show dashboard,
	 * if user isn't logged in, show the login-form
	 */
	public function showLoginForm() {
		$guard = null;

		if (Session::has('ageGroup')){
			$age = Session::get('ageGroup');
		}else{
			session(['ageGroup' => 'default']);
			$age = Session::get('ageGroup');
		}

		if ( Auth::guard( $guard )->check() ) {
			return redirect('/' . $age . '/dashboard');
		}

		return view( 'age-layouts.' . $age . '.login' );
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
