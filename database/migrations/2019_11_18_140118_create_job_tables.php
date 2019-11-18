<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tipe_job');
            $table->foreign('tipe_job')->on('job_types')->references('id');
            $table->string('nama_perusahaan');
            $table->string('requirements');
            $table->date('tanggal_expired')->nullable();
            $table->string('gaji')->nullable();
            $table->text('alamat_perusahaan');
            $table->text('deskripsi');
            $table->string('foto_perusahaan');
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
        Schema::dropIfExists('jobs');
    }
}
