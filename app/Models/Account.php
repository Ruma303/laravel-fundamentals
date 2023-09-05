<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Detail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Model
{
    use HasFactory;
    public function detail(): HasOne
    {
        return $this->hasOne(Detail::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
