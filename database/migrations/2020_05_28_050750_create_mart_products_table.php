<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMartProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mart_products', function (Blueprint $table) {
            $table->unsignedBigInteger('mart_id')->unsigned()->index();
            $table->unsignedBigInteger('product_id')->unsigned()->index();
            $table->foreign('mart_id')->references('id')->on('marts')->onDelete('CASCADE');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mart_products');
    }
}
