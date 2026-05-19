<?php

use App\Http\Controllers\VisitController;
use App\Http\Controllers\JokeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/random_joke', [JokeController::class, 'random']);
