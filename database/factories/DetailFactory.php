<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Detail; // Assicurati di avere il modello Detail corretto qui
use Illuminate\Database\Eloquent\Factories\Factory;

class DetailFactory extends Factory
{
    protected $model = Detail::class; // Cambia questo in Detail::class

    public function definition(): array
    {
        return [
            'account_id' => function () {
                if (Account::count() === 0) { // Qui dovrebbe essere Account::class
                    return Account::factory()->create()->id; // E qui anche
                }

                return Account::inRandomOrder()->first()->id; // E qui
            },
            'description' => $this->faker->paragraph(5),
        ];
    }
}
