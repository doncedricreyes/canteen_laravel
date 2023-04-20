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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('rfid');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->double('balance');
            $table->string('email')->nullable();
            $table->string('level');
            $table->string('section');
            $table->string('status');
            $table->double('discount')->nullable();
            $table->double('limit')->nullable();
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
        Schema::dropIfExists('customers');
    }
};
