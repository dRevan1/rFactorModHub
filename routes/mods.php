<?php

use App\Http\Controllers\ModsController;
use App\Http\Controllers\TracksController;
use App\Http\Controllers\VehiclesController;
use App\Http\Controllers\OtherController;
use Illuminate\Support\Facades\Route;

Route::resource("track", TracksController::class);
Route::resource("vehicle", VehiclesController::class);
Route::resource("others", OtherController::class);
Route::resource("mods", ModsController::class);