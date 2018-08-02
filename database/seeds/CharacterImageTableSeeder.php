<?php

use Illuminate\Database\Seeder;

class CharacterImageTableSeeder extends Seeder
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
		    \Illuminate\Support\Facades\DB::table( 'character_images' )->insert( [
			    'character_id' => $id,
			    'img' => 'character.jpg'
		    ]);

		    $id++;
	    }
    }
}
