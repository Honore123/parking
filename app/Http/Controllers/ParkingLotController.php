<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\ParkingLot;
use Illuminate\Http\Request;

class ParkingLotController extends Controller
{
    public function index(){
       $available =  ParkingLot::query()->where('availability',1)->count();
        echo $available;
    }
    public function update(ParkingLot $position, $availability){
        if ($position->availability != 2){
            $position->update(['availability' => $availability]);
        }
        echo "Worked";
    }
}
