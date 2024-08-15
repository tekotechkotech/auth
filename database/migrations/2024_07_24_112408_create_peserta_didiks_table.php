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
        Schema::create('peserta_didik', function (Blueprint $table) {
            $table->uuid('id_peserta_didik')->primary();
            $table->uuid('user_id');
            $table->uuid('kelas_id')->nullable();
            $table->enum('status',['1','0'])->default('1');
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('user_id')->references('id_user')->on('user')->onDelete('cascade');
            $table->foreign('kelas_id')->references('id_kelas')->on('kelas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta_didik');
    }
};
