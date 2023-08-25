<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Detail;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetailFactory extends Factory
{
    protected $model = Detail::class;
    public function definition(): array
    {
        return [
            'description' => $this->faker->paragraph(5),
            'account_id' => function () {
                if (Account::count() === 0) {
                    return Account::factory()->create()->id;
                }
                return Account::inRandomOrder()->first()->id;
            }
        ];
    }
}

