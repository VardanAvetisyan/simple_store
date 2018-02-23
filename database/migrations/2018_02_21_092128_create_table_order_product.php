<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrderProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function(Blueprint $table){
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('product_id');
            $table->decimal('price');
            $table->integer('qty');

            $table->index('order_id');
            $table->index('product_id');
            $table->index('price');
            $table->index('qty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_product', function(Blueprint $table){
            $table->dropIfExists();
        });
    }
}
