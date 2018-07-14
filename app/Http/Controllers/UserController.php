<?php
/**
 * Created by PhpStorm.
 * User: danielahofmann
 * Date: 14.07.18
 * Time: 14:54
 */

namespace App\Http\Controllers;

use http\Env\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	public function performLogout(\Illuminate\Http\Request $request)
	{
		Auth::logout();
		return redirect('/');
	}
}