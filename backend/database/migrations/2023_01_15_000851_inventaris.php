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
        Schema::create('inventaris', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('tipe');
            $table->string('tanggal_pembelian');
            $table->string('harga');
            $table->string('supplier');
            $table->string('pemegang');
            $table->string('lokasi');
            $table->string('status');
            $table->longText('image_url');
            $table->string('image_title');
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
        Schema::dropIfExists('inventaris');
    }
};
