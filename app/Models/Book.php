<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    const CREATED_AT = 'creato_il';
    const UPDATED_AT = 'aggiornato_il';
}
