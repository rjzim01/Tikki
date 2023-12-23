<?php

namespace App\Http\Controllers;

use App\Models\Sit;
use App\Models\Trip;
use App\Models\BookTicket;

use Illuminate\Http\Request;

class SitController extends Controller
{
    public function showSit($id)
    {
        //$sits = Sit::all();
        //$sits = Sit::where('trip_id', $id->id)->get();
        //$sits = $id->sits;
        // $sits = Sit::whereHas('trip', function ($query) use ($trip) {
        //     $query->where('id', $trip->id);
        // })->get();
        //return view('sits.showSits', compact('sits'));
        //return $sits;
        //$trip = Trip::with('sits')->find($id->id);

        // Check if the sits are loaded
        // if ($trip->sits->isEmpty()) {
        //     return "No sits found for this trip.";
        // }
        $sits = Sit::where('trip_id', $id)->get();
        return view('sits.showSits', compact('sits'));
        //return $sits;
    }
    public function updateSit(Sit $sit)
    {
        return view('sits.updateSit', compact('sit'));
        //return $sit;
    }
    public function updateSitStore(Sit $sit, Request $request)
    {
        $userId = $request->user()->id;

        $sit->update([
            'sit_status' => 'B',
        ]);
        // $sit->update([
        //     'sit_number' => $request->input('sit_number'),
        //     'sit_status' => $request->input('sit_status'),
        // ]);
        BookTicket::create(
            [
                'trip_id' => $sit->trip_id,
                'sit_id' => $sit->id,
                'user_id' => $userId,
            ]
        );
        return redirect()->route('profile');
    }

}
