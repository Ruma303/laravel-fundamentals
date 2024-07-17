<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    protected $model = User::class;
    public function run(): void
    {
        $this->model::factory(10)->create();
    }
}
