<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerjanjiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perjanjians', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_pasien');
            $table->string('nama_dokter');
            $table->string('spesialiasi_dokter');
            $table->string('waktu_perjanjian');
            $table->string('alamat_pasien')->nullable();
            $table->string('tgl_datang')->nullable();
            $table->string('nama_obat')->nullable();
            $table->string('no_telp')->nullable();
            $table->text('keluhan_pasien')->nullable();
            $table->unsignedBigInteger('dokter_id');
            $table->unsignedBigInteger('pasien_id')->nullable();
            // $table->unsignedBigInteger('dokter_id');
            $table->foreign('dokter_id')->references('id')->on('dokters')->onDelete('cascade');
            $table->foreign('pasien_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('dokter_id')->references('id')->on('users');
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
        Schema::dropIfExists('perjanjians');
    }
}
