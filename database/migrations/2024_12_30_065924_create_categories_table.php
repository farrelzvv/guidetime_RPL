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
        // Menggunakan chaining method pada Schema::create untuk membangun tabel 'categories'
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Primary key dengan tipe auto-increment
            $table->string('name'); // Kolom nama kategori bertipe string
            $table->timestamps(); // Kolom created_at dan updated_at otomatis
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Pola
        // - Builder

        // Mekanisme
        // Menghapus tabel 'categories' jika rollback dijalankan
        Schema::dropIfExists('categories');
    }
};
