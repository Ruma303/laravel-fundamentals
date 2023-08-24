<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AccountSeeder extends Seeder
{
    protected $model = Account::class;
    public function run(): void
    {
        $this->model::factory(10)->create();
    }
}
