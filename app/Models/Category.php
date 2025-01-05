<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Factory Method untuk pembuatan model.
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory; // Gunakan Factory Method untuk pembuatan instance model.

    protected $fillable = ['name']; // Menentukan kolom yang dapat diisi massal.

    /**
     * Relasi satu ke banyak dengan Product.
     * 
     * Pola: Structural - Adapter
     * Menyederhanakan relasi antara Category dan Product.
     */
    public function products()
    {
        return $this->hasMany(Product::class); // Relasi hasMany.
    }
}
