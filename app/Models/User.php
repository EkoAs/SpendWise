<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// Masukkan semua kolom yang boleh diisi di sini
#[Fillable(['name', 'phone', 'ktp', 'pin', 'balance'])]
// Sembunyikan PIN agar tidak bocor saat data diambil
#[Hidden(['pin', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            // Beri tahu Laravel bahwa kolom 'pin' harus di-hash (enkripsi)
            'pin' => 'hashed',
        ];
    }
}