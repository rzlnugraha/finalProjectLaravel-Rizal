<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
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
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->on('companies')->references('id');
            $table->string('nama_pekerjaan');
            $table->text('requirements');
            $table->date('tanggal_expired')->nullable();
            $table->string('gaji')->nullable();
            $table->text('deskripsi_pekerjaan');
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
