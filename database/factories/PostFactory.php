<?php

namespace Database\Factories;

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
        $name = $this->faker->sentence;
        return [
            'title' => $name,
            'slug' => str($name)->slug(),
            'content' => fake()->paragraphs(20, true),
            'description' => fake()->paragraphs(3, true),
            'category_id' => fake()->randomElement([1, 5, 4, 6, 7, 20]),
            'posted' => fake()->randomElement(['yes', 'not']),
            'image' => fake()->imageUrl(),
        ];
    }
}
