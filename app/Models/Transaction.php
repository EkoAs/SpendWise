<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

// Buka gembok untuk kolom-kolom ini agar bisa di-write oleh controller
#[Fillable(['user_id', 'type', 'amount', 'description'])]
class Transaction extends Model
{
    use HasFactory;
}