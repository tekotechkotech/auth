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
        Schema::create('kelas', function (Blueprint $table) {
            $table->uuid('id_kelas')->primary();
            $table->uuid('cabang_id');
            $table->uuid('wali_kelas');
            $table->string('nama', 100);
            $table->string('deskripsi');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('cabang_id')->references('id_instansi_cabang')->on('instansi_cabang')->onDelete('cascade');
        
            $table->foreign('wali_kelas')->references('id_pengurus')->on('pengurus')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
