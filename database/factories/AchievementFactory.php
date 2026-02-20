<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Achievement>
 */
class AchievementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'level' => $this->faker->randomElement(['provinsi', 'nasional', 'internasional']),
            'year' => $this->faker->year,
            'description' => $this->faker->paragraph,
            'image' => 'https://via.placeholder.com/640x480.png/00ee_dd?text=Achievement+Image',
        ];
    }
}
