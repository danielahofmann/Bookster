<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    for($var = 0; $var <= 11; $var ++) {
		    \Illuminate\Support\Facades\DB::table( 'users' )->insert( [
			    'firstname' => str_random( 10 ),
			    'lastname'  => str_random( 10 ),
			    'email'     => 'test@sonne.de',
			    'password'  => bcrypt( 'secret' ),
		    ] );
	    }
    }
}
