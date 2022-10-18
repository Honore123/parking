<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Door;
use App\Models\ParkingLot;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(ParkingLot $parking)
    {
        $booking = Booking::where('user_id', auth()->user()->id)->first();
        if (!is_null($booking)) {

            return redirect()->back()->with('error', 'You are allowed to book one parking space');
        }
        Booking::create([
            'user_id' => auth()->user()->id,
            'parking_lot_id' => $parking->id,
        ]);
        $parking->update(['availability' => 2]);

        return redirect()->back()->with('success', 'You booked a parking space');
    }

    public function openDoor(Door $door)
    {
        $door->update(['state' => 1, 'user_id' => auth()->user()->id]);

        return redirect()->back()->with('success', 'Now you can press button to open the door');
    }

    public function deviceOpen()
    {
        $door = Door::first();
        $booked = Booking::query()->where('user_id',$door->user_id)->first();
        if($booked){
            $parkingLot = ParkingLot::where('id',$booked->parking_lot_id)->first();
            $parkingLot->update(['availability' => 1]);
            $booked->delete();
        }
        echo $door->state;
    }

    public function deviceClose()
    {
        $door = Door::first();
        $door->update(['state' => 0]);
    }

    public function delete(ParkingLot $parking)
    {
        Booking::where('parking_lot_id', $parking->id)->delete();
        $door = Door::where('id',1)->first();
        $door->update(['state'=>0]);
        $parking->update(['availability' => 1]);

        return redirect()->back()->with('success', 'You have cancelled your booking');
    }

}
