<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
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
            'description' => fake()->text,
            'price' => fake()->randomFloat(2, 0, 100),
            'author' => fake()->unique()->name,
            'image' => fake()->imageUrl(640, 480, 'books', true),
          
        ];
    }
}
