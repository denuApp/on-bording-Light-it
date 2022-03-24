<?php

namespace Tests\Feature;

use App\Http\Controllers\FlightController;
use App\Models\Airline;
use App\Models\City;
use App\Models\Flight;
use Tests\TestCase;

class DeleteFlightTest extends TestCase
{
    public function test_delete_flight_correctly()
    {
        $this->withoutExceptionHandling();

        $airline = Airline::factory()->create();
        $origin = City::factory()->create();
        $destination = City::factory()->create();

        $flight = Flight::factory()
            ->create([
                'airline_id' => $airline['id'],
                'origin_id' => $origin['id'],
                'destination_id' => $destination['id'],
            ]);

        $this
            ->delete(action([FlightController::class, 'destroy'], $flight->id));

        $this
            ->assertDatabaseMissing(Flight::class, [
                'id' => $flight['id'],
                'airline_id' => $flight['airline_id'],
                'origin_id' => $flight['origin_id'],
                'destination_id' => $flight['destination_id'],
            ]);
    }
}
