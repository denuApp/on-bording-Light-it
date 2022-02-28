<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

       return view('admins.airlines', ['airlines' => Airline::latest()->paginate(10) ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'name' => ['required' , 'max:50', Rule::unique('airlines', 'name')],
            'description' => ['required', 'max:225']
        ]);

        Airline::create($attributes);


        return redirect('/airlines')->with('success', 'New airline added.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Airline  $airline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Airline $airline)
    {
        $attributes = request()->validate([
            'name' => ['required' , 'max:50', Rule::unique('airlines', 'name')],
            'description' => ['required', 'max:225']
        ]);

        $airline->update($attributes);


        return back('')->with('success', 'Airline updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Airline  $airline
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $airline)
    {
        $airline = Airline::find($airline);
        $airline->delete();

//        DB::table('airlines')->where('id', $airline->id)->delete();
        return back()->with('success', 'Airline deleted.');
    }
}
