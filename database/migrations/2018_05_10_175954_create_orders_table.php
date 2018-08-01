<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->length(11);
            $table->integer('deliveryAddress_id')->length(11);
            $table->integer('billAddress_id')->length(11);
            $table->integer('state_id')->length(11)->default(0)->nullable();
            $table->string('price', 28);
            $table->string('payment_method', 28);
            $table->string('shipping_method', 28);
            $table->integer('agb')->default(0)->nullable();
            $table->integer('shipped')->default(0)->nullable();
            $table->date('ordered_at');
            $table->date('send_at')->default(null)->nullable();
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
        Schema::dropIfExists('orders');
    }
}
