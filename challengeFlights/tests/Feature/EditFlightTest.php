<?php

namespace Tests\Feature;

use App\Http\Controllers\FlightController;
use App\Models\Airline;
use App\Models\City;
use App\Models\Flight;
use Tests\TestCase;

class EditFlightTest extends TestCase
{
    public function test_flight_updated_correctly()
    {
        $this->withoutExceptionHandling();

        $airline1 = Airline::factory()->create();
        $airline2 = Airline::factory()->create();
        $origin = City::factory()->create();
        $destination = City::factory()->create();
        $newTime = time();

        $flight = Flight::factory()
            ->create([
                'airline_id' => $airline1['id'],
                'origin_id' => $origin['id'],
                'destination_id' => $destination['id'],
            ]);

        $this
            ->patch(action([FlightController::class, 'update'], $flight->id), [
                'airline_id' => $airline2['id'],
                'origin_id' => $flight['origin_id'],
                'destination_id' => $flight['origin_id'],
                'time_departure' => $newTime,
                'time_arrival' => $newTime,
            ])
            ->assertSuccessful();

        $this
            ->assertDatabaseHas(Flight::class, [
                'airline_id' => $airline2['id'],
            ])
            ->assertDatabaseMissing(Flight::class, [
                'airline_id' => $airline1['id'],
            ]);
    }
}
