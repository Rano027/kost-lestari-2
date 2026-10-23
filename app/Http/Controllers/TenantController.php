<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Booking;
use Illuminate\Http\Request;

class TenantController extends Controller
{
        public function index()
    {
        $tenants = Tenant::with(['room', 'booking'])
            ->latest()
            ->get();

        return view('admin.tenants.index', compact('tenants'));
    }

    public function create($bookingId)
    {
        $booking = Booking::with('room')->findOrFail($bookingId);

        if ($booking->status !== 'approved') {
            return redirect()
                ->route('admin.bookings.index')
                ->with('error', 'Hanya booking yang sudah disetujui yang dapat dijadikan penyewa.');
        }

        return view('admin.tenants.create', compact('booking'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'booking_id' => 'required|exists:bookings,id',
        'room_id' => 'required|exists:rooms,id',
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'move_in_date' => 'required|date',
        'move_out_date' => 'nullable|date|after_or_equal:move_in_date',
        'status' => 'required|in:active,inactive',
        'notes' => 'nullable|string',
    ]);

    $booking = Booking::findOrFail($validated['booking_id']);

    if ($booking->status !== 'approved') {
        return back()
            ->with('error', 'Hanya booking yang sudah disetujui yang dapat dijadikan penyewa.');
    }

    Tenant::create($validated);

    return redirect()
        ->route('admin.tenants.index')
        ->with('success', 'Data penyewa berhasil ditambahkan.');
}
}