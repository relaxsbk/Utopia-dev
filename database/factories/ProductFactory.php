<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'slug' => $this->faker->unique()->slug(),
            'description' => $this->faker->text(),
            'price' => $this->faker->numberBetween(100, 1000),
            'discount' => $this->faker->numberBetween(0, 50),
            'quantity' => $this->faker->numberBetween(0, 100),
            'published' => $this->faker->boolean(),
        ];
    }
}
