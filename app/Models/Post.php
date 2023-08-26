<?php

namespace App\Models;

use App\Models\Account;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }
}
