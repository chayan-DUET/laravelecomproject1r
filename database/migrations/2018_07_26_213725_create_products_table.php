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
          $table->string('productName');
           $table->integer('categoryId');
          $table->integer('manufacturerId');
            $table->float('productPrice',10,2);
            $table->integer('productQuantity');
            $table->text('productShortDiscription');
            $table->text('productLongDiscription');
          $table->text('productImage');
           $table->tinyInteger('publicationstatus');
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
