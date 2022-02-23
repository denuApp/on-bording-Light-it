<?php

namespace Database\Factories;

use App\Models\Airline;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flight>
 */
class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_airline' => Airline::factory(),
            'id_origin' => City::factory(),
            'id_destination' => City::factory(),
            'time_departure' => $this->faker->dateTime(),
            'time_arrival' => $this->faker->dateTime(),
        ];
    }
}
