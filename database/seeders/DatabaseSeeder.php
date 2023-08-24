<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\DetailSeeder;
use Database\Seeders\AccountSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AccountSeeder::class);
        $this->call(DetailSeeder::class);
    }
}

