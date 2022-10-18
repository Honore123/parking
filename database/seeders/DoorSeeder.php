<?php

namespace Database\Seeders;

use App\Models\Door;
use Illuminate\Database\Seeder;

class DoorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Door::firstOrCreate([
            'state' => 0
        ]);
    }
}
