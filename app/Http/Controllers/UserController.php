<?php
/**
 * Created by PhpStorm.
 * User: danielahofmann
 * Date: 14.07.18
 * Time: 14:54
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	}

	public function index()
	{
		return view('admin.pages.dashboard');
	}
}