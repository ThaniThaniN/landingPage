<?php

namespace Database\Factories;

use App\Models\ProductRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProductRequest>
 */
class ProductRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'phone' => fake()->phoneNumber(),
            'bName' => fake()->company(),
            'branches' => fake()->numberBetween(1, 10),
            'message' => fake()->text()
        ];
    }

    public function archived(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'archived',
        ]);
    }

    public function processed(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'processed',
        ]);
    }
}
