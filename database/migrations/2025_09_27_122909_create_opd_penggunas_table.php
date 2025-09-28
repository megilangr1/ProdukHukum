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
        Schema::create('opd_penggunas', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignId('id_user');
            $table->foreignId('id_opd');
            $table->string('nip');
            $table->string('nama_lengkap');
            $table->string('jabatan');
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
        Schema::dropIfExists('opd_penggunas');
    }
};
