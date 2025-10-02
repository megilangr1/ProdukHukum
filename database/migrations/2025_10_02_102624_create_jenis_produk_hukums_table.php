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
        Schema::create('jenis_produk_hukums', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('kode_jenis_ph')->unique();
            $table->string('nama_jenis_ph');
            $table->text('keterangan')->nullable();
            $table->foreignId('id_creator')->nullable();
            $table->string('nama_creator')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_produk_hukums');
    }
};
