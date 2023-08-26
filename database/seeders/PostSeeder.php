<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    protected $model = Post::class;
    public function run(): void
    {
        Post::factory(50)->create();
    }
}
