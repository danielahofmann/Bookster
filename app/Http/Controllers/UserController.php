<?php
/**
 * Created by PhpStorm.
 * User: danielahofmann
 * Date: 14.07.18
 * Time: 14:54
 */

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
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

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request)
	{
		$user = User::find(Auth::guard('admin')->user()->id);
		$user->firstname = $request->input('firstname');
		$user->lastname = $request->input('lastname');
		$user->email = $request->input('email');
		$user->save();

		return redirect()
			->back()
			->with('status', 'Benutzerdaten erfolgreich geändert');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function updateEmployee(Request $request, $id)
	{
		$user = User::find($id);
		$user->firstname = $request->input('firstname');
		$user->lastname = $request->input('lastname');
		$user->email = $request->input('email');
		$user->role = $request->input('role');
		$user->save();

		return redirect()
			->route( 'admin.users')
			->with('status', 'Mitarbeiterdaten erfolgreich geändert');
	}


}