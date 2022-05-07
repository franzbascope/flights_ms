<?php

use Franz\Fligths\Http\Controllers\ItineraryController;
use Illuminate\Support\Facades\Route;

Route::middleware(['api'])->group(function () {
    Route::get('/itineraries', [ItineraryController::class, "index"]);
    Route::get('/itineraries/{uuid}', [ItineraryController::class, "edit"]);
    Route::post('/itineraries', [ItineraryController::class, "create"]);
    Route::patch('/itineraries/flight_program/{itinerary_uuid}', [ItineraryController::class, "addFlightProgram"]);
    Route::patch('/itineraries/{itinerary_uuid}/flight_program/{program_uuid}/flight', [ItineraryController::class, "addFlight"]);
});
