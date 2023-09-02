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
        return [
            'name' => $this->faker->word,
            'photo' => $this->faker->imageUrl,
            'category_id' => rand(1,10),
            'user_id' => rand(1,10),
            'description' => $this->faker->paragraph        
        ];
    }
}
