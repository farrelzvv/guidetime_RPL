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
        // - Foreign Key Constraint

        // Mekanisme
        // Menggunakan chaining method pada Schema::create untuk membangun tabel 'products'
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Primary key dengan tipe auto-increment
            $table->string('title'); // Kolom judul produk bertipe string
            $table->text('description'); // Kolom deskripsi produk bertipe text
            $table->foreignId('category_id') // Foreign key untuk menghubungkan dengan tabel categories
                ->nullable() // Nilai bisa null
                ->constrained('categories') // Mengacu pada tabel 'categories'
                ->onDelete('set null'); // Jika kategori dihapus, set kolom ini menjadi null
            $table->date('date'); // Kolom harga dengan presisi 10 digit dan 2 desimal
            $table->string('image'); // Kolom untuk path gambar produk bertipe string
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
        // Menghapus tabel 'products' jika rollback dijalankan
        Schema::dropIfExists('products');
    }
};
