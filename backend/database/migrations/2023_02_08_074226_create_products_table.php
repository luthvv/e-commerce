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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_id');
            $table->string('image');
            $table->string('name');
            $table->unsignedBigInteger('category');
            $table->unsignedBigInteger('sub_category');
            $table->string('brand');
            $table->integer('price');
            $table->integer('stock');
            $table->boolean('condition');
            $table->string('description');
            $table->string('variant');
            $table->integer('weight');
            $table->integer('promo')->nullable();
            $table->integer('rating')->nullable();
            $table->integer('sold')->nullable();
            $table->timestamps();

            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
            $table->foreign('category')->references('id')->on('product_categories')->onDelete('cascade');
            $table->foreign('sub_category')->references('id')->on('product_sub_categories')->onDelete('cascade');
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
};
