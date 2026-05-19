<?php

namespace App\Http\Controllers;

use App\Services\VisitTrackingService;
use Illuminate\Http\Request;

class VisitController extends Controller
{

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        (new VisitTrackingService)->track($request);

        return response()->json(['status' => 'ok']);
    }
}
