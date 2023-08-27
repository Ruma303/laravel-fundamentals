<?php

namespace App\Models;

use App\Models\Account;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body'
    ];
    use HasFactory;
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }
    public function tags() : BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
