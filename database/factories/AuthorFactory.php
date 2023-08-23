<?php

namespace Database\Factories;
use App\Models\Author;

 use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    protected $model = Author::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Carlo Neri',
        ];
        //'name' => $this->faker->name,
        //'name' => Str::random(15),


         /* $created_at = $this->faker->dateTimeBetween('-2 years', 'now');
        $updated_at = $this->faker->dateTimeBetween($created_at, 'now');
        return [
            'name' => $this->faker->name,
            'created_at' => $created_at,
            'updated_at' => $updated_at,
        ]; */
    }

}
