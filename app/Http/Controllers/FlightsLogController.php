<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;

class FlightsLogController extends Controller
{
    public function index()
    {
        $logs = ActivityLog::query()->with(['causer', 'subject'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('flights_log.index', [
            'logs' => $logs,
        ]);
    }

    public function show($id)
    {
        return view('flights_log.show', [
            'log' => ActivityLog::query()->findOrFail($id),
        ]);
    }
}
