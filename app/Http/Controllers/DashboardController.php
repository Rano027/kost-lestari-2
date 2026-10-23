<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use App\Models\Complaint;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRooms = Room::count();

        $occupiedRooms = Room::where('status', 'occupied')->count();

        $availableRooms = Room::where('status', 'available')->count();

        $pendingBookings = Booking::where('status', 'pending')->count();

        $newComplaints = Complaint::where('status', 'new')->count();

        $recentBookings = Booking::with('room')
            ->latest()
            ->take(5)
            ->get();

        $recentComplaints = Complaint::with('room')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalRooms',
            'occupiedRooms',
            'availableRooms',
            'pendingBookings',
            'newComplaints',
            'recentBookings',
            'recentComplaints'
        ));
    }
}