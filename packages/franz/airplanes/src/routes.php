<?php


use Franz\Airplanes\Http\Controllers\AircraftController;
use Illuminate\Support\Facades\Route;

Route::middleware(['api'])->group(function () {
    Route::get('/aircrafts',[AircraftController::class,"index"]);
    Route::get('/aircrafts/{uuid}',[AircraftController::class,"edit"]);
});
