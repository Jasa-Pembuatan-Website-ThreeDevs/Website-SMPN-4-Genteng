<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announcement>
 */
class AnnouncementFactory extends Factory
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
            'content' => $this->faker->paragraph,
            'image' => 'https://via.placeholder.com/640x480.png/00cc_aa?text=Announcement+Image',
            'status' => $this->faker->randomElement(['publish', 'draft']),
            'published_at' => $this->faker->dateTimeThisMonth(),
        ];
    }
}
