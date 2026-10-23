<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $rooms = Room::latest()->get();

    return view('admin.rooms.index', compact('rooms'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('admin.rooms.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'room_number' => 'required|string|max:255|unique:rooms,room_number',
        'name' => 'nullable|string|max:255',
        'price' => 'nullable|numeric|min:0',
        'status' => 'required|in:available,occupied,maintenance',
        'description' => 'nullable|string',
        'facilities' => 'nullable|string',
    ]);

    Room::create($validated);

    return redirect()
        ->route('admin.rooms.index')
        ->with('success', 'Kamar berhasil ditambahkan.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $room = Room::findOrFail($id);

    return view('admin.rooms.edit', compact('room'));
}
    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
{
    $room = Room::findOrFail($id);

    $validated = $request->validate([
        'room_number' => 'required|string|max:255|unique:rooms,room_number,' . $room->id,
        'name' => 'nullable|string|max:255',
        'price' => 'nullable|numeric|min:0',
        'status' => 'required|in:available,occupied,maintenance',
        'description' => 'nullable|string',
        'facilities' => 'nullable|string',
    ]);

    $room->update($validated);

    return redirect()
        ->route('admin.rooms.index')
        ->with('success', 'Kamar berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $room = Room::findOrFail($id);

    $room->delete();

    return redirect()
        ->route('admin.rooms.index')
        ->with('success', 'Kamar berhasil dihapus.');
}
}
