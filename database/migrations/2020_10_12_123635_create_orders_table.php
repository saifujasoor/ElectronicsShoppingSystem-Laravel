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
            $table->string('customer_name');
            $table->string('address');
            $table->string('landmark');
            $table->string('email');
            $table->string('contact_no');
            $table->integer('amount');
            $table->integer('flag');
            $table->integer('qty');
            $table->string('order_status');
            $table->integer('cancel_flag');
            $table->integer('area_id')->unsigned();
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
            $table->integer('pro_attribute_id')->unsigned();
            $table->foreign('pro_attribute_id')->references('id')->on('products_attributes')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('delivery_address_id')->unsigned();
            $table->foreign('delivery_address_id')->references('id')->on('delivery_addresses')->onDelete('cascade');
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
