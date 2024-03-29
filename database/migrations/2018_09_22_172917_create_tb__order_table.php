<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_Order', function (Blueprint $table) {
            $table->increments('order_id');
			 $table->integer('customer_id');
			 $table->integer('shipping_id');
			 $table->integer('payment_id');
			 $table->string('order_total');
			 $table->integer('order_status');
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
        Schema::dropIfExists('tb_Order');
    }
}
