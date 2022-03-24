<?php

namespace Tests\Feature;

use App\Http\Controllers\FlightController;
use App\Models\Airline;
use App\Models\City;
use App\Models\Flight;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateFlightTest extends TestCase
{

    public function test_create_a_flight (){

        $this->withoutExceptionHandling();

        $airline = Airline::factory()->create();

        $origin = City::factory()->create();

        $destination = City::factory()->create();

        $this
            ->post(action([FlightController::class, 'store']),
            [
                'airline_id' => $airline['id'],
                'origin_id' => $origin['id'],
                'destination_id' => $destination['id'],
                'time_departure' => '2022-03-02 15:51:00',
                'time_arrival' => '2022-03-05 15:51:00',

            ])
            ->assertSuccessful();

        $this
            ->assertDatabaseHas(Flight::class, [
                'airline_id' => $airline['id'],
                'origin_id' => $origin['id'],
                'destination_id' => $destination['id'],
                'time_departure' => '2022-03-02 15:51:00',
                'time_arrival' => '2022-03-05 15:51:00',
            ]);

    }


}
