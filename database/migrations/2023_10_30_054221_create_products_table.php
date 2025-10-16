<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('category_id');
            $table->string('name');
            $table->string('slug');
            $table->string('brand_id');
            $table->string('model');
            $table->longText('short_desc');
            $table->longText('desc');
            $table->longText('lead_time');
            $table->integer('tax_id');
            $table->enum('is_promo', ["1", "0"])->default('0');
            $table->enum('is_featured', ["1", "0"])->default('0');
            $table->enum('is_discounted', ["1", "0"])->default('0');
            $table->enum('is_tranding', ["1", "0"])->default('0');
            $table->longText('keywords');
            $table->longText('technical_specification');
            $table->longText('uses');
            $table->longText('warranty');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('products');
    }
}
