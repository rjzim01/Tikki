<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Sit;

use Illuminate\Http\Request;


class TripController extends Controller
{
    public function show()
    {
        $trips = Trip::all();
        return view('trips.show', compact('trips'));
        //return $trips;
    }
    public function form()
    {
        return view('trips.form');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'from' => 'required',
            'to' => 'required',
            'departure' => 'required',
            'arrival' => 'required',
        ]);
        Trip::create($data);

        return redirect()->route('trips');
    }
}
