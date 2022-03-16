<?php

namespace App\Http\Controllers;

use App\Models\Disponibility;
use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins.flights', ['flights' => Flight::latest()->paginate(10)]);

//        return Flight::all();
    }

    public function fetch()
    {
        $flights = Flight::with(['airline.cities', 'origin', 'destination'])->get();

        return response()->json([
            'flights' => $flights,
        ]);
    }

    public function flightsData()
    {
        return Flight::all()->toArray();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
                'airline_id' => ['required'],
                'origin_id' => ['required'],
                'destination_id' => ['required'],
                'time_departure' => ['required'],
                'time_arrival' =>  ['required'],
            ]);

        Flight::create($attributes);

        return response()->json([
                    'status' => 200,
                    'message' => 'arrival date prior to departure date',
                ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function show(Flight $flight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function edit(Flight $flight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flight $flight)
    {

        $attributes = request()->validate([
            'airline_id' => ['required'],
            'origin_id' => ['required'],
            'destination_id' => ['required'],
            'time_departure' => ['required'],
            'time_arrival' =>  ['required'],
        ]);

        $originExists = Disponibility::where('city_id', $attributes['origin_id'])->where('airline_id', $attributes['airline_id'])->get();
        $destinationExists = Disponibility::where('city_id', $attributes['destination_id'])->where('airline_id', $attributes['airline_id'])->get();

        if(empty($originExists) && empty($destinationExists))
        {

            $flight->update($attributes);

            return response()->json([
                'status' => 200,
                'message' => 'Flight updated successfully!',
            ]);
        }else{
            return response()->json([
                'status' => 500,
                'message' => 'can`t update flight',
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flight $flight)
    {
        $flight->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Flight deleted successfully!',
        ]);
    }
}
