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
        $sits = Sit::where('trip_id', $id)->get();
        return view('sits.showSits', compact('sits'));
        //return $sits;
    }
    // public function updateSit($sitId, $tripId)
    // {
    //     //return view('sits.updateSit', compact('sit'));
    //     //return $trip;
    //     $sit = Sit::where('sit_number', $sitId)
    //         ->where('trip_id', $tripId)
    //         ->first();
    //     //return $sit;
    //     return view('sits.updateSit', compact('sit'));
    // }
    // public function updateSitStore($sitId, $tripId, Request $request)
    // {
    //     $userId = $request->user()->id;
    //     $sit = Sit::where('sit_number', $sitId)
    //         ->where('trip_id', $tripId)
    //         ->first();

    //     $sit->update([
    //         'sit_status' => 'B',
    //     ]);
    //     // $sit->update([
    //     //     'sit_number' => $request->input('sit_number'),
    //     //     'sit_status' => $request->input('sit_status'),
    //     // ]);
    //     BookTicket::create(
    //         [
    //             'trip_id' => $sit->trip_id,
    //             'sit_id' => $sit->id,
    //             'user_id' => $userId,
    //         ]
    //     );
    //     return redirect()->route('profile');
    // }

    public function updateSit($sitId, $tripId)
    {
        $sit = Sit::where('sit_number', $sitId)
            ->where('trip_id', $tripId)
            ->first();
        return view('sits.updateSit', compact('sit'));
    }
    public function updateSitStore($sitId, $tripId, Request $request)
    {
        $userId = $request->user()->id;
        $sit = Sit::where('sit_number', $sitId)
            ->where('trip_id', $tripId)
            ->first();

        $sit->update([
            'sit_status' => 'B',
        ]);

        BookTicket::create(
            [
                'trip_id' => $sit->trip_id,
                'sit_id' => $sit->id,
                'user_id' => $userId,
            ]
        );
        return redirect()->route('profile');
    }

    // public function update(Sit $sit, Trip $trip)
    // {
    //     return view('sits.updateSit', compact('sit'));
    // }

    // public function updateStore(Request $request, Sit $sit, Trip $trip)
    // {
    //     $userId = $request->user()->id;

    //     $sit->update([
    //         'sit_status' => 'B',
    //     ]);

    //     BookTicket::create([
    //         'trip_id' => $sit->trip_id,
    //         'sit_id' => $sit->id,
    //         'user_id' => $userId,
    //     ]);

    //     return redirect()->route('profile');
    // }

}
