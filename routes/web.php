<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view('home.index');
});

Route::get("/tracks", function () {
    return view('tracks.tracks');
})->name('tracks');

Route::get("/vehicles", function () {
    return view('vehicles.vehicles');
})->name('vehicles');

Route::get("/setups", function () {
    return view('setups.setups');
})->name('setups');

Route::get("/other", function () {
    return view('other.other');
})->name('other');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
