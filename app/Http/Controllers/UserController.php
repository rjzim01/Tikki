<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registerStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:users',
            'password' => 'required|min:1',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;

        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('login');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginValidate(Request $request)
    {
        $credentials = request()->only('phone', 'password');

        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();

            return redirect()->route('home');
        }

        return back()->withErrors([
            'phone' => 'The provided credentials do not match our records.',
        ]);

    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function profile()
    {
        //$user = User::find(Auth::id());
        //return view('auth.profile', compact('user'));
        //$user = User::with('bookTickets.trip')->find(Auth::id());
        //return view('auth.profile', compact('user'));
        ///return $user;
        $user = User::with(['bookTickets.trip', 'bookTickets.sit:id,sit_number'])
            ->find(Auth::id());

        return view('auth.profile', compact('user'));
    }

    public function showCalendar()
    {
        $currentDate = Carbon::now();
        $daysInMonth = $currentDate->daysInMonth;
        $calendarDates = [];

        for ($i = 1; $i <= $daysInMonth; $i++) {
            $calendarDates[] = $currentDate->copy()->day($i);
        }

        return view('calender.calender', compact('calendarDates', 'currentDate'));
    }


}
