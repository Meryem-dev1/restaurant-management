<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chef>
 */
class ChefFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->name(),
            'email'=>$this->faker->unique()->safeEmail(),
            'tel_number'=>$this->faker->phoneNumber(),
            'image' => $this->faker->imageUrl,
            'speciality' => $this->faker->randomElement(['chef', 'cook', 'baker', 'sous-chef', 'pastry chef']),
        ];
    }
}
