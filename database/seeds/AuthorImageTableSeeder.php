<?php

use Illuminate\Database\Seeder;

class AuthorImageTableSeeder extends Seeder
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
		    \Illuminate\Support\Facades\DB::table( 'author_images' )->insert( [
			    'author_id' => $id,
			    'img' => 'author.png'
		    ]);

		    $id++;
	    }
    }
}
