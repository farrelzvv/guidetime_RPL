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
        // Pola
        // - Builder

        // Mekanisme
        // Menggunakan chaining method pada Schema::create untuk membangun tabel 'users'
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary key dengan tipe auto-increment
            $table->string('name'); // Kolom nama bertipe string
            $table->string('email')->unique(); // Email unik untuk setiap pengguna
            $table->timestamp('email_verified_at')->nullable(); // Waktu verifikasi email, bisa null
            $table->tinyInteger('role')->default(1); // Role dengan default nilai 1 (User biasa)
            $table->string('password'); // Password yang di-hash
            $table->rememberToken(); // Token untuk mengingat sesi pengguna
            $table->timestamps(); // Timestamps untuk created_at dan updated_at
        });

        // Pola
        // - Builder

        // Mekanisme
        // Membuat tabel 'password_reset_tokens' dengan chaining method
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); // Email sebagai primary key
            $table->string('token'); // Token untuk reset password
            $table->timestamp('created_at')->nullable(); // Waktu pembuatan token
        });

        // Pola
        // - Builder

        // Mekanisme
        // Menggunakan chaining method untuk membangun tabel 'sessions'
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // Primary key untuk sesi ID
            $table->foreignId('user_id')->nullable()->index(); // Foreign key opsional yang terhubung ke pengguna
            $table->string('ip_address', 45)->nullable(); // IP Address pengguna
            $table->text('user_agent')->nullable(); // Informasi perangkat pengguna
            $table->longText('payload'); // Data sesi yang disimpan
            $table->integer('last_activity')->index(); // Waktu aktivitas terakhir
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Menghapus tabel jika rollback dijalankan
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
