<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
	        $table->integer('user_id')->length(11);
	        $table->integer('genre_id')->length(11);
	        $table->integer('category_id')->length(11);
	        $table->integer('author_id')->length(11);
	        $table->string('name', 128);
	        $table->string('price', 11);
	        $table->text('description');
	        $table->string('amount', 50);
	        $table->integer('bestseller')->length(1)->default('0');
			$table->string('release', '28');
	        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
