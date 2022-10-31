<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penjual')->nullable();
            $table->string('harga_jual')->nullable();
            $table->string('tonase_jual')->nullable();
            $table->string('total_jual')->nullable();
            $table->bigInteger('pembelian_id')->unsigned()->nullable();
            $table->foreign('pembelian_id')->references('id')->on('pembelians')->onDelete('cascade');
            $table->bigInteger('periode_id')->unsigned();
            $table->foreign('periode_id')->references('id')->on('periodes')->onDelete('cascade');
            $table->bigInteger('datausaha_id')->unsigned();
            $table->foreign('datausaha_id')->references('id')->on('datausahas')->onDelete('cascade');
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
        Schema::dropIfExists('penjualans');
    }
}