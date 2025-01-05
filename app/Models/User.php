<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Atribut yang dapat diisi massal
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
    ];

    // Atribut yang harus disembunyikan saat diserialisasi
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Atribut yang harus dikonversi ke tipe tertentu
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
