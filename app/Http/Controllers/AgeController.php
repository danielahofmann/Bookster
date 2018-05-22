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
		switch ($_GET['age']) {
			case '0 bis 7':
				session( [ 'ageGroup' => 'toddlers' ] );

				break;

			case '8 bis 12':
				session( [ 'ageGroup' => 'kids' ] );

				break;

			case '13 bis 18':
				session( [ 'ageGroup' => 'teens' ] );

				break;

			case '19 bis 50':
				session( [ 'ageGroup' => 'default' ] );

				break;

			case '51 bis 65':
				session( [ 'ageGroup' => 'elderly' ] );

				break;

			case 'über 65':
				session( [ 'ageGroup' => 'seniors' ] );

				break;
		}
    }

}
