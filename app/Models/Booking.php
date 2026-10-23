<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;
use App\Models\Tenant;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'name',
        'phone',
        'move_in_date',
        'duration',
        'notes',
        'status',
    ];

    protected $casts = [
        'move_in_date' => 'date',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function tenant()
{
    return $this->hasOne(Tenant::class);
}
}