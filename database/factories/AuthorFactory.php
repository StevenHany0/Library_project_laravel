<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->name,
            'bio' => fake()->text,
            'profile_picture' => fake()->imageUrl(640, 480, 'authors', true),
            'job_description' => fake()->jobTitle,
            'email' => fake()->unique()->safeEmail,
            'book_id' => fake()->numberBetween(1, 10),
        ];
    }
}
