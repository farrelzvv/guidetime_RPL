<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Atribut yang dapat diisi massal
    protected $fillable = ['title', 'description', 'date', 'image'];

    // Relasi dengan model Category
    public function category()
    {
        return $this->belongsTo(Category::class); // Menggunakan pola Adapter untuk relasi ke kategori
    }
}
