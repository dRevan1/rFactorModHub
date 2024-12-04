<?php

use App\Http\Controllers\TracksController;
use App\Http\Controllers\VehiclesController;
use Illuminate\Support\Facades\Route;

Route::resource("track", TracksController::class);
Route::resource("vehicle", VehiclesController::class);