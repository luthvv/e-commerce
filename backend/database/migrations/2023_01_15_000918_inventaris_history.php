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
        Schema::create('inventaris_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_barang');
            $table->string('pemegang');
            $table->string('lokasi');
            $table->string('status');
            $table->longText('image_url');
            $table->string('image_title');
            $table->string('pengedit');
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
        Schema::dropIfExists('inventaris_history');
    }
};
