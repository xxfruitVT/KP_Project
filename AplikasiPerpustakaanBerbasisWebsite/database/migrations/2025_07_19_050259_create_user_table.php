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
            $table->id('id_user');
            $table->string('kode_user')->nullable();
            $table->string('nis')->nullable();
            $table->string('fullname');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('kelas')->nullable();
            $table->string('alamat')->nullable();
            $table->string('verif')->default('Tidak');
            $table->string('role')->default('Anggota'); // Admin / Anggota
            $table->string('terakhir_login')->nullable();
            $table->string('join_date')->nullable();
            $table->rememberToken(); // Biar Laravel Auth jalan
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
