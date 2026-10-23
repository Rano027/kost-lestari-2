<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;
use App\Models\Booking;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
    'booking_id',
    'room_id',
    'name',
    'phone',
    'move_in_date',
    'move_out_date',
    'status',
    'notes',
];

    protected $casts = [
        'move_in_date' => 'date',
        'move_out_date' => 'date',
    ];

    public function room()
{
    return $this->belongsTo(Room::class);
}

public function payments()
{
    return $this->hasMany(Payment::class);
}
public function booking()
{
    return $this->belongsTo(Booking::class);
}
}
