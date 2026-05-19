<?php

use App\Http\Controllers\StatsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/stats', function () {
        return view('stats');
    });

    Route::get('/api/stats/hourly', [StatsController::class, 'hourly']);
    Route::get('/api/stats/cities', [StatsController::class, 'cities']);
});


Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')
    ->name('login');


Route::get('/register', function () {
    return view('auth.register');
})->middleware('guest')
    ->name('register');

require __DIR__.'/auth.php';
