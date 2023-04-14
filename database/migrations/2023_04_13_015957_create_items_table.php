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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('qty');
            $table->double('buy_price');
            $table->double('sell_price');
            $table->string('status');
            $table->string('pic');
            $table->unsignedBigInteger('category_id');
            $table->string('remove')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
