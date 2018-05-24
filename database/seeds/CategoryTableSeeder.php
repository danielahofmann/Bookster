<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    \Illuminate\Support\Facades\DB::table( 'categories' )->insert( [
		    'name' => 'Belletristik',
		    'url' => '/belletristik/',
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
		    ] );

	    \Illuminate\Support\Facades\DB::table( 'categories' )->insert( [
		    'name' => 'Sachbücher',
		    'url' => '/sachbuecher/',
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
	    ] );

	    \Illuminate\Support\Facades\DB::table( 'categories' )->insert( [
		    'name' => 'Kinder- und Jugendbücher',
		    'url' => '/kinderundjugend/',
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s')

	    ] );

	    \Illuminate\Support\Facades\DB::table( 'categories' )->insert( [
		    'name' => 'Schule und Lernen',
		    'url' => '/schule/',
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
	    ] );

	    \Illuminate\Support\Facades\DB::table( 'categories' )->insert( [
		    'name' => 'Ratgeber',
		    'url' => '/ratgeber/',
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
	    ] );

	    \Illuminate\Support\Facades\DB::table( 'categories' )->insert( [
		    'name' => 'Freizeit und Hobby',
		    'url' => '/hobby/',
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
	    ] );

	    \Illuminate\Support\Facades\DB::table( 'categories' )->insert( [
		    'name' => 'Fachbücher',
		    'url' => '/fachbuecher/',
		    'created_at' => Carbon::now()->format('Y-m-d H:i:s')
	    ] );
    }
}
