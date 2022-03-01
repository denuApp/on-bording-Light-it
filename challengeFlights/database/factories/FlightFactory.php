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
        $timeArrival = $this->faker->dateTime();

        return[

            'airline_id' => Airline::factory(),
            'origin_id' => City::factory(),
            'destination_id' => City::factory(),
            'time_arrival' => $timeArrival,
            'time_departure' =>  $this->faker->dateTime($timeArrival),

        ];
    }
}
