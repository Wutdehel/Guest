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
        Schema::create('keluar_masuk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pendaftaran');
            $table->datetime('tanggal_masuk');
            $table->datetime('tanggal_keluar')->nullable();
            $table->string('foto_masuk', 255)->nullable();
            $table->integer('lantai');
            $table->integer('rak');
            $table->enum('keperluan', ['maintenance', 'visit', 'installasi', 'goodsin', 'goodsout'])->default("visit");
            $table->string('detail', 250);
            $table->enum('keterangan', ['belum_keluar', 'done'])->default("belum_keluar");
            $table->timestamps();
            $table->foreign('id_pendaftaran')->references('id')->on('pendaftaran') ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keluar_masuk');
    }
};
