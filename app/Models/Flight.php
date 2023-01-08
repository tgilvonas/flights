<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $casts = [
        'departure_time' => 'datetime',
        'arrival_time' => 'datetime',
    ];

    public function status()
    {
        return $this->belongsTo(FlightStatus::class, 'status_id');
    }

    public function airportFrom()
    {
        return $this->belongsTo(Airport::class, 'airport_from');
    }

    public function airportTo()
    {
        return $this->belongsTo(Airport::class, 'airport_to');
    }

    public function departureTimezone()
    {
        return $this->belongsTo(Timezone::class, 'departure_timezone');
    }

    public function arrivalTimezone()
    {
        return $this->belongsTo(Timezone::class, 'arrival_timezone');
    }
}
