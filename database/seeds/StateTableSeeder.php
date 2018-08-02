<?php

use Illuminate\Database\Seeder;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    \Illuminate\Support\Facades\DB::table( 'states' )->insert([
			'name' => 'Bestellung aufgegeben'
	    ]);

	    \Illuminate\Support\Facades\DB::table( 'states' )->insert([
		    'name' => 'Bestellung wird bearbeitet'
	    ]);

	    \Illuminate\Support\Facades\DB::table( 'states' )->insert([
		    'name' => 'Bestellung wurde versandt'
	    ]);

	    \Illuminate\Support\Facades\DB::table( 'states' )->insert([
		    'name' => 'Bestellung zugestellt'
	    ]);

	    \Illuminate\Support\Facades\DB::table( 'states' )->insert([
		    'name' => 'Bestellung wurde bezahlt'
	    ]);

	    \Illuminate\Support\Facades\DB::table( 'states' )->insert([
		    'name' => 'Retoure'
	    ]);
    }
}
