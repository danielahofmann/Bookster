<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Customer;
use App\Author;
use App\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$this->call(CategoryTableSeeder::class);
		$this->call(GenreTableSeeder::class);

	    factory(User::class, 10)->create();
	    factory(Customer::class, 10)->create();
	    factory(Author::class, 10)->create();
	    factory(Product::class, 20)->create();
    }
}
