<?php

use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $id = 1;

	    for($var = 0; $var <= 11; $var ++) {
		    \Illuminate\Support\Facades\DB::table( 'images' )->insert( [
		    	'product_id' => $id,
			    'img' => 'cover.jpeg'
	        ]);

		    $id++;
	    }
    }
}
