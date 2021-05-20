<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnpopularProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unpopular_products', function (Blueprint $table) {
            $table->increments('id_unpopular_product');
            $table->string('name_unpopular_product');
            $table->integer('quantity_unpopular_product');
            $table->integer('price_unpopular_product');
            $table->string('product_type_unpopular_product');
            $table->string('image_unpopular_product');
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
        Schema::dropIfExists('unpopular_products');
    }
}