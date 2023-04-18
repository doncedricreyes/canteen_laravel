<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('item_id');
            $table->string('item_name');
            $table->integer('qty');
            $table->double('price');
            $table->string('mop')->nullable();
            $table->integer('status');
            $table->double('amount_paid')->nullable();
            $table->double('change')->nullable();
            $table->double('total_amount');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('item_id')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
};
