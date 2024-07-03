<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_dokter', function (Blueprint $table) {
            $table->id('id_dokter')->autoIncrement();
            $table->bigInteger('user_id')->index();
            $table->bigInteger('spesialis_id')->index();
            $table->string('title_depan');
            $table->string('nama_dokter');
            $table->string('title_belakang');
            $table->string('img_dokter')->nullable();
            $table->string('alamat');
            $table->string('no_tlp');
            $table->string('tempat_kerja');
            $table->integer('tahun_lulus');
            $table->date('tgl_mulai_aktif');
            $table->string('alumni_kampus');
            $table->bigInteger('no_reg');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->enum('status', ['pending', 'approve', 'reject', 'suspend']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_dokter');
    }
};
