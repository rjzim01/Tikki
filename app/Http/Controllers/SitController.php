<?php

namespace App\Http\Controllers;

use App\Models\Sit;
use App\Models\BookTicket;

use Illuminate\Http\Request;

class SitController extends Controller
{
    public function showSit()
    {
        $sits = Sit::all();
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
