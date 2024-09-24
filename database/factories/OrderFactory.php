<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'trackinNum' => fake()->numberBetween(6, 10000000),
            'name' => fake()->name(),
            'numItems' => fake()->numberBetween(1, 10)
        ];
    }
}
