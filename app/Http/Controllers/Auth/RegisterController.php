<?php

namespace App\Http\Controllers\Auth;

use App\Customer;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     */
	protected function redirectTo()
	{
		if(Session::has('checkout') && Session::get('checkout') == 1){
			$path = '/' . Session::get('ageGroup') . '/order';
			return $path;
		}else {

			if ( Session::has( 'ageGroup' ) ) {
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'housenum' => 'required|max:10',
            'postcode' => 'required|string|max:255',
            'birthday' => 'nullable|date',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

	/**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Customer
     */
    protected function create(array $data)
    {
        return Customer::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'street' => $data['street'],
            'housenum' => $data['housenum'],
            'postcode' => $data['postcode'],
            'city' => $data['city'],
            'birthday' => $data['birthday'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * show form for registration
     */
	public function showRegistrationForm() {
		return view( 'age-layouts.' . Session::get('ageGroup') . '.register' );
    }
}
