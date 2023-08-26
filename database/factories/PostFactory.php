<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'account_id' => function () {
                if (Account::count() === 0) {
                    return Account::factory()->create()->id;
                }
                return Account::inRandomOrder()->first()->id;
            },
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function (Post $post) {
            $tags = Tag::inRandomOrder()->take(rand(1, 3))->get();
            $post->tags()->attach($tags);
        });
    }
}
