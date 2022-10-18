<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Door;
use App\Models\ParkingLot;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function parking()
    {
        $user = null;
        if (isset(auth()->user()->id)){
            $user = Booking::with(['user'])->where('user_id', auth()->user()->id)->first();
        }
        return view('dashboard.partials.parking', [
            'parkings' => ParkingLot::where('id','<=',2)->get(),
            'parkingSeconds' =>  ParkingLot::where('id','>',2)->get(),
            'user' => $user,
            'door' => Door::first(),
            'booked' => auth()
        ]);
    }
}
