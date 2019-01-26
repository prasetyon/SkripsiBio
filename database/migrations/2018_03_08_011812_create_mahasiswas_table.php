<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->string('nim', 12)->unique();
            $table->string('strata', 2);
            $table->string('nama_mhs', 100);
            $table->string('judul', 255)->nullable();
            $table->string('proposal', 255)->nullable();
            $table->date('tanggal_sidang_proposal')->nullable();
            $table->string('jam_sidang_proposal', 3)->nullable();
            $table->smallInteger('ruangan_sidang_proposal')->length(1)->nullable();
            $table->string('revisi_proposal', 255)->nullable();
            $table->string('revisi', 255)->nullable();
            $table->date('tanggal_sidang_akhir')->nullable();
            $table->string('jam_sidang_akhir', 3)->nullable();
            $table->smallInteger('ruangan_sidang_akhir')->length(1)->nullable();
            $table->string('pembimbing_1', 20)->nullable();
            $table->string('nama_pembimbing_1', 100)->nullable();
            $table->string('pembimbing_2', 20)->nullable();
            $table->string('nama_pembimbing_2', 100)->nullable();
            $table->string('penguji_1', 20)->nullable();
            $table->string('nama_penguji_1', 100)->nullable();
            $table->string('penguji_2', 20)->nullable();
            $table->string('nama_penguji_2', 100)->nullable();
            $table->string('penguji_3', 20)->nullable();
            $table->string('nama_penguji_3', 100)->nullable();
            $table->smallInteger('status')->length(1)->nullable();
            $table->string('undangan_proposal', 255)->nullable();
            $table->string('undangan_akhir', 255)->nullable();
            $table->string('lempeng', 255)->nullable();
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
        Schema::dropIfExists('mahasiswas');
    }
}
