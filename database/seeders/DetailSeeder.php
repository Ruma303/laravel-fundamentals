<?php

namespace Database\Seeders;

use App\Models\Detail;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DetailSeeder extends Seeder
{
    protected $model = Detail::class;
    public function run(): void
    {
        $this->model::factory(10)->create();
    }
}
