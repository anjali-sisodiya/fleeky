<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
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
        $table->string('title');
        $table->string('code');
        $table->string('value');
        $table->enum('type', ["Value", "Per"])->default('Value');
        $table->integer('min_order_amt');
        $table->enum('is_one_time', ["1", "0"])->default('1');
        $table->enum('status', ["1", "0"])->default('1');
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
        Schema::dropIfExists('coupons');
    }
}
