<?php

use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    for($var = 0; $var <= 11; $var ++) {
		    \Illuminate\Support\Facades\DB::table( 'customers' )->insert( [
			    'firstname' => str_random( 10 ),
			    'lastname'  => str_random( 10 ),
			    'street'  => str_random( 10 ),
			    'city'  => str_random( 10 ),
			    'housenum'  => '3',
			    'postcode' => '04288',
			    'birthday' => '01.02.1992',
			    'password'  => bcrypt( 'secret' ),
		    ] );
	    }
    }
}
