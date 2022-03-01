<?php

namespace Database\Factories;

use App\Models\Airline;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Disponibility>
 */
class DisponibilityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //cuando lo cree a mano usar attach para que quede relacionado una sola vez una city con una aerolina

        return [

            'id_city' => City::get()->random()->id,
            'id_airline' => Airline::get()->random()->id,
        ];
    }
}
