<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use App\Models\City;
use Illuminate\Validation\Rule;

class AirlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins.airlines', ['airlines' => Airline::latest()->paginate(10), 'cities'=>City::all()]);
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
    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:50', Rule::unique('airlines', 'name')],
            'description' => ['required', 'max:225'],
        ]);

        $cities = request()->validate([
            'cities' => ['required'],
        ]);

        logger($cities);

        $airline = Airline::create($attributes);

        foreach ($cities as $city) {
            $airline->cities()->sync($city);
        }

        return response()->json([
            'status' => 200,
            'message' => 'New airline added successfully!',
        ]);
    }

    public function fetch()
    {
        $airlines = Airline::with('cities')->withCount('flights')->paginate(10);

        $toShow = ['id', 'name', 'description', 'flights_count'];

        return response()->json([
            'airlines' => $airlines,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Airline  $airline
     * @return \Illuminate\Http\Response
     */
    public function show(Airline $airline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Airline  $airline
     * @return \Illuminate\Http\Response
     */
    public function edit(Airline $airline)
    {
        return response()->json([
            'status'=>200,
            'airline'=>$airline,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Airline  $airline
     * @return \Illuminate\Http\Response
     */
    public function update(Airline $airline)
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:50', Rule::unique('airlines', 'name')],
            'description' => ['required', 'max:225'],
        ]);

        $airline->update($attributes);

        return response()->json([
            'status' => 200,
            'message' => 'Airline updated successfully!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Airline  $airline
     * @return \Illuminate\Http\Response
     */
    public function destroy(Airline $airline)
    {
        $airline->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Airline deleted successfully!',
        ]);
    }
}
