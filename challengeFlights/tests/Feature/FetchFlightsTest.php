<?php

namespace Tests\Feature;

use App\Models\Airline;
use App\Models\City;
use App\Models\Flight;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FetchFlightsTest extends TestCase
{

    public function test_shows_table(){

        $this->withoutExceptionHandling();

        $airline = Airline::factory()->create();

        $origin = City::factory()->create();

        $destination = City::factory()->create();

        $flight = Flight::factory()
            ->create([
                'airline_id' => $airline['id'],
                'origin_id' => $origin['id'],
                'destination_id' => $destination['id']
            ]);



        $this
            ->get('fetch-flight')
            ->assertSuccessful()
            ->assertSee([
                $flight->id,
                $airline->name,
                $origin->name,
                $destination->name,
            ]);
    }
}
