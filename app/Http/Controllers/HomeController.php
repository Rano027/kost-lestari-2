<?php

namespace App\Http\Controllers;

use App\Models\Room;

class HomeController extends Controller
{
    public function index()
    {
        $rooms = Room::where('status', 'available')
            ->latest()
            ->get();

        return view('welcome', compact('rooms'));
    }

    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }
}