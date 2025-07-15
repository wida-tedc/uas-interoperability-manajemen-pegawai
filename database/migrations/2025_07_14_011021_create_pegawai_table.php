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
        Schema::create('pegawai', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('nip')->unique();
        $table->unsignedBigInteger('jabatan_id');
        $table->unsignedBigInteger('bidang_id');
        $table->timestamps();

        $table->foreign('jabatan_id')->references('id')->on('jabatan')->onDelete('cascade');
        $table->foreign('bidang_id')->references('id')->on('bidang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
