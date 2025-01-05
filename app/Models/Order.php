<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Factory Method untuk pembuatan model.
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory; // Gunakan Factory Method untuk pembuatan instance model.

    protected $fillable = [
        'product_id',  // ID produk
        'user_id',     // ID pengguna
        'status',      // Status pesanan
    ];

    /**
     * Relasi belongsTo dengan Product.
     * 
     * Pola: Structural - Adapter
     * Menyederhanakan relasi antara Order dan Product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class); // Relasi belongsTo.
    }

    /**
     * Relasi belongsTo dengan User.
     * 
     * Pola: Structural - Adapter
     * Menyederhanakan relasi antara Order dan User.
     */
    public function user()
    {
        return $this->belongsTo(User::class); // Relasi belongsTo.
    }
}
