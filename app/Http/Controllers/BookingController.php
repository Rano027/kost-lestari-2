<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Menampilkan form booking.
     */
    public function create(Room $room)
    {
        // Kamar hanya bisa dibooking jika tersedia
        if ($room->status !== 'available') {
            abort(404);
        }

        return view('bookings.create', compact('room'));
    }

    /**
     * Menyimpan booking.
     */
    public function store(Request $request, Room $room)
    {
        if ($room->status !== 'available') {
            abort(404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'move_in_date' => 'required|date',
            'duration' => 'required|integer|min:1',
            'notes' => 'nullable|string|max:1000',
        ]);

        $booking = Booking::create([
            'room_id' => $room->id,
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'move_in_date' => $validated['move_in_date'],
            'duration' => $validated['duration'],
            'notes' => $validated['notes'] ?? null,
            'status' => 'pending',
        ]);

        // Kode booking sementara menggunakan ID booking
       $bookingCode = 'LK-' . now()->format('Ymd') . '-' . str_pad(
    $booking->id,
    4,
    '0',
    STR_PAD_LEFT
);

$booking->booking_code = $bookingCode;
$booking->save();

return view('bookings.success', compact(
    'booking',
    'bookingCode',
    'room'
));
    }
    public function checkForm()
{
    return view('bookings.check');
}

public function checkStatus(Request $request)
{
    $request->validate([
        'booking_code' => 'required|string',
    ]);

    $booking = Booking::where('booking_code', $request->booking_code)
        ->with('room')
        ->first();

    if (!$booking) {
        return back()
            ->withInput()
            ->with('error', 'Kode booking tidak ditemukan.');
    }

    return view('bookings.status', compact('booking'));
}
public function adminIndex()
{
    $bookings = Booking::with('room')
        ->latest()
        ->get();

    return view('admin.bookings.index', compact('bookings'));
}
public function approve($id)
{
    $booking = Booking::with('room')->findOrFail($id);

    // Pastikan booking masih pending
    if ($booking->status !== 'pending') {
        return back()->with('error', 'Booking ini sudah diproses.');
    }

    $booking->update([
        'status' => 'approved',
    ]);

    // Ubah status kamar menjadi occupied
    $booking->room->update([
        'status' => 'occupied',
    ]);

    return back()->with('success', 'Booking berhasil disetujui.');
}

public function reject($id)
{
    $booking = Booking::findOrFail($id);

    // Pastikan booking masih pending
    if ($booking->status !== 'pending') {
        return back()->with('error', 'Booking ini sudah diproses.');
    }

    $booking->update([
        'status' => 'rejected',
    ]);

    return back()->with('success', 'Booking berhasil ditolak.');
}
}