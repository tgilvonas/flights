<?php

namespace App\Models;

class ActivityLog extends \Spatie\Activitylog\Models\Activity
{
    protected $casts = [
        'properties' => 'string',
    ];
}
