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

            // 'name' => $this->faker->name(),
            // 'image' => $this->faker->imageUrl(),
            // 'price' => $this->faker->randomFloat(2, 1, 100), // price should be a float
            // 'ingredients' => $this->faker->text(),
            // 'description' => $this->faker->text(),
            // 'category_id' => $this->faker->numberBetween(1, 10), // assuming category_id is an integer between 1 and 10
            // 'user_id' => $this->faker->numberBetween(1, 10), // assuming user_id is an integer between 1 and 10



        ];
    }
}
