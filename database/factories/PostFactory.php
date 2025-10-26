<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
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
        $title = fake()->sentence(6);
        return [
            'user_id' => User::inRandomOrder()->first()->id ?? 1,
            'slug' => Str::slug($title) . '-' . Str::random(5),
            'status' => fake()->randomElement(['active', 'inactive', 'draft']),
            'category' => fake()->randomElement(['Tech', 'Business', 'Education', 'Lifestyle', 'Health']),
            'title' => $title,
            'content' => fake()->paragraphs(3, true),
        ];
    }
}
