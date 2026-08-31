<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'venue',
        'event_date',
        'capacity',
        'price',
    ];
    public function bookings()
{
    return $this->hasMany(Booking::class);
}
}