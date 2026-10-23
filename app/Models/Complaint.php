<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'name',
        'phone',
        'category',
        'description',
        'image',
        'status',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}