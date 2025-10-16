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
        Schema::create('user', function (Blueprint $table) {
            // Ganti dari auto-increment id() menjadi uuid
            $table->uuid('id')->primary();
            
            $table->string('nama');
            $table->string('nim');
            $table->foreignUuid('kelas_id')->constrained(); // ubah ke UUID juga agar konsisten
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};