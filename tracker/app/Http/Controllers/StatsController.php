<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    public function hourly()
    {
        return Visit::selectRaw('
        DATE(created_at) as day,
        HOUR(created_at) as hour,
        COUNT(*) as count
    ')
            ->groupByRaw('DATE(created_at), HOUR(created_at)')
            ->orderByRaw('DATE(created_at), HOUR(created_at)')
            ->get();
    }

    public function cities()
    {
        return Visit::select('city', DB::raw('count(*) as count'))
            ->groupBy('city')
            ->get();
    }
}
