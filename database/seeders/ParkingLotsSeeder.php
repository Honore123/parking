<?php

namespace Database\Seeders;

use App\Models\ParkingLot;
use Illuminate\Database\Seeder;

class ParkingLotsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([1,2,3,4])->each(function ($position){
            ParkingLot::firstOrCreate([
                'position' => $position,
                'availability' => 1
            ]);
        });
    }
}
