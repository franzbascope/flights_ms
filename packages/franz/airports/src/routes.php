<?php

use Franz\Airports\Http\Controllers\AirportController;
use Illuminate\Support\Facades\Route;

Route::middleware(['api'])->group(function () {
    Route::get('/airports',[AirportController::class,"index"]);
    Route::get('/airports/{uuid}',[AirportController::class,"edit"]);
    Route::get('/airports/cityCode/{code}',[AirportController::class,"findByCityCode"]);
    Route::get('/airports/generate_flight_code/{code}',[AirportController::class,"generateFlightCode"]);
});
