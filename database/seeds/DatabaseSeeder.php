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
//        $this->call(UsersTableSeeder::class);
//        $this->call(AuthorTableSeeder::class);
		$this->call(CategoryTableSeeder::class);
//        $this->call(CustomerTableSeeder::class);
//        $this->call(GenreTableSeeder::class);
//        $this->call(ProductTableSeeder::class);

	    DB::table('users')->truncate();
	    DB::table('customers')->truncate();
	    DB::table('products')->truncate();
	    DB::table('authors')->truncate();

	    factory(User::class, 10)->create();
	    factory(Customer::class, 10)->create();
	    factory(Author::class, 10)->create();
	    factory(Product::class, 20)->create();
    }
}
