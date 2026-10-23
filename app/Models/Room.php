<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_number',
        'name',
        'description',
        'price',
        'status',
        'facilities',
        'image',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    public function tenants()
{
    return $this->hasMany(Tenant::class);
}

public function bookings()
{
    return $this->hasMany(Booking::class);
}

public function complaints()
{
    return $this->hasMany(Complaint::class);
}
}