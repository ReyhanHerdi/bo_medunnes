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
        Schema::create('user_pasien', function (Blueprint $table) {
            $table->id('id_pasien')->autoIncrement();
            $table->bigInteger('user_id')->index();
            $table->bigInteger('nik');
            $table->string('nama_pasien');
            $table->string('img_pasien')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('alamat');
            $table->string('no_tlp');
            $table->integer('TB');
            $table->integer('BB');
            $table->enum('status', ['active', 'suspend']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_pasien');
    }
};
