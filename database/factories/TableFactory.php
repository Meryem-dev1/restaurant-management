<?php

namespace Database\Factories;

use App\Models\Table;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\TableStatus;
use App\Enums\TableLocation;

class TableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Table::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Table ' . $this->faker->numberBetween(1, 30),
            'guest_number' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->randomElement(TableStatus::cases()),
            'location' => $this->faker->randomElement(TableLocation::cases()),
        ];
    }
}
