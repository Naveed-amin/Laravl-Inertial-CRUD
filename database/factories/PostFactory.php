<?php

namespace Database\Factories;

use App\Models\User;
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
        $user_ids = User::pluck('id')->toArray();

        return [
            'user_id' => $user_ids[array_rand($user_ids)],
            'title' => fake()->text(50),
            'author' => fake()->name(),
            'content' => fake()->text(200)
        ];
    }
}
