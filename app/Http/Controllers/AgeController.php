<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgeController extends Controller
{

	public function saveAgeToSession() {
		session(['age' => $_GET['age']]);

		$this->defineAgeGroup();

		$session_data = [
			'age' => session('age'),
			'ageGroup' => session('ageGroup')
		];

		return $session_data;

    }

	public function defineAgeGroup() {
		//switches age to save the right ageGroup to the session, which will be used mainly in the following code

		switch ($_GET['age']) {
			case '0-7':
				session( [ 'ageGroup' => 'toddlers' ] );
				break;

			case '8-12':
				session( [ 'ageGroup' => 'kids' ] );
				break;

			case '13-18':
				session( [ 'ageGroup' => 'teens' ] );
				break;

			case '19-50':
				session( [ 'ageGroup' => 'default' ] );
				break;

			case '51-65':
				session( [ 'ageGroup' => 'elderly' ] );
				break;

			case '66-99':
				session( [ 'ageGroup' => 'seniors' ] );
				break;
		}
    }

}
