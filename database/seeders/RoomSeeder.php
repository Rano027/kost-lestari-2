<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 21; $i++) {
            Room::create([
                'room_number' => 'Kamar ' . $i,
                'name' => 'Kamar ' . $i,
                'description' => null,
                'price' => null,
                'status' => 'occupied',
                'facilities' => null,
                'image' => null,
            ]);
        }
    }
}