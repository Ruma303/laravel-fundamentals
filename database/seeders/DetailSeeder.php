<?php

namespace Database\Seeders;

use App\Models\Detail;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DetailSeeder extends Seeder
{
    public function run(): void
    {
        Detail::factory(10)->create();
    }
}
