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
        Schema::create('pasien_tambahan', function (Blueprint $table) {
            $table->bigIncrements('id_pasien_tambahan');
            $table->bigInteger('pasien_id')->index();
            $table->string('nama_pasien_tambahan');
            $table->integer('TB');
            $table->integer('BB');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->date('tgl_lahir');
            $table->string('hubungan_keluarga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien_tambahan');
    }
};
