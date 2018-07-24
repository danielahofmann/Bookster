<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

	public function saveAge()
	{
		return view('test');
	}

	/**
	 * Show the application admin-dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function indexAdmin()
	{
		$user = Auth::guard('admin')->user();

		return view('admin.pages.dashboard', ['user' => $user]);
	}
}
