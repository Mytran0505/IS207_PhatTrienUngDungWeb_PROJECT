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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('type', 50);
            $table->integer('number');
            $table->integer('menu_id');
            $table->integer('product_id');
            $table->integer('active');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('status', 20);;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
};
