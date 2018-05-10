<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    for($var = 0; $var <= 11; $var ++) {
		    \Illuminate\Support\Facades\DB::table( 'products' )->insert( [
			    'user_id' => '1',
			    'genre_id' => '1',
			    'category_id' => '1',
			    'author_id' => '1',
			    'name'  => str_random( 10 ),
			    'price'     => '11,95',
			    'description' => 'Lorem ipsum dolor sit amet consuctor lorem ipsum Lorem ipsum dolor sit amet consuctor lorem ipsum Lorem ipsum dolor sit amet consuctor lorem ipsum Lorem ipsum dolor sit amet consuctor lorem ipsum ',
			    'amount'  => '2000',
			    'release' => '09.07.2018'
		    ] );
	    }
    }
}
