<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins.cities', ['cities' => City::latest()->paginate(10)]);
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
            'name' => ['required', 'max:50', Rule::unique('cities', 'name')],
        ]);
        City::create($attributes);

        return response()->json([
                'status' => 200,
                'message' => 'New city added successfully!',
            ]);
    }

    public function fetch()
    {
        $cities = City::withCount(['origin', 'destination'])->get();
        //$cities = City::all()->loadCount(['origin','destination']);

        return response()->json([
            'cities' => $cities,
        ])->paginate(10);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return response()->json([
                'status'=>200,
                'city'=>$city,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(City $city)
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:50', Rule::unique('cities', 'name')],
        ]);

        $city->update($attributes);

        return response()->json([
            'status' => 200,
            'message' => 'City updated successfully!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();

        return response()->json([
            'status' => 200,
            'message' => 'City deleted successfully!',
        ]);
    }
}
