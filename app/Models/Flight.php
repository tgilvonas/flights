<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Flight extends Model
{
    use LogsActivity;

    protected $casts = [
        'departure_time' => 'datetime',
        'arrival_time' => 'datetime',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'code',
                'departure_time',
                'arrival_time',
                'passengers',
                'status.name',
                'airportFrom.name',
                'airportTo.name',
                'departureTimezone.name2',
                'arrivalTimezone.name2',
            ])->logOnlyDirty();
    }

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
