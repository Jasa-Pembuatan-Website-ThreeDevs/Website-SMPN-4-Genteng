<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PpdbBatch>
 */
class PpdbBatchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = $this->faker->dateTimeThisYear();
        $endDate = $this->faker->dateTimeBetween($startDate, $startDate->format('Y-m-d H:i:s').' +2 months');

        return [
            'name' => 'Gelombang ' . $this->faker->unique()->numberBetween(1, 10),
            'start_date' => $startDate,
            'end_date' => $endDate,
            'is_active' => $this->faker->boolean,
            'description' => $this->faker->paragraph,
        ];
    }
}
