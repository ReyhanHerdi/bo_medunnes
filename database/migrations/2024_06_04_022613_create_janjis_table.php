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
        Schema::create('janji', function (Blueprint $table) {
            $table->bigIncrements('id_janji');
            $table->bigInteger('pasien_id')->index();
            $table->bigInteger('dokter_id')->index();
            $table->bigInteger('pasien_tambahan_id')->index();
            $table->bigInteger('sesi_id')->index();
            $table->dateTime("datetime");
            $table->string('catatan');
            $table->enum('status', ['pending', 'accepted', 'rejected']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('janji');
    }
};
