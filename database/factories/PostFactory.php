<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $title = $this->faker->sentence;
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $this->faker->paragraph(10),
            'announcement' => $this->faker->randomElement(['announcement', 'news']),
            'thumbnail' => 'https://via.placeholder.com/640x480.png/00ff77?text=Post+Image',
            'user_id' => User::factory(),
            'published_at' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'expired_at' => $this->faker->dateTimeBetween('+1 year', '+2 years'),
            'is_active' => $this->faker->boolean,
        ];
    }
}
