<?php

namespace App\Services;

use App\Models\Visit;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class VisitTrackingService
{
    public function track(Request $request): Visit
    {
        $ip = $request->input('ip') ?? $request->ip();

        if (!$ip || !filter_var($ip, FILTER_VALIDATE_IP)) {
            $ip = $request->ip();
        }

        $currentUserInfo = Location::get($ip);
        $city = $request->input('city') ?? ($currentUserInfo?->cityName ?? 'unknown');

        return Visit::create([
            'ip' => $ip,
            'city' => $city,
            'device' => $request->input('device') ?? 'unknown',
        ]);
    }
}
