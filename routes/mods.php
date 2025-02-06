<?php

use App\Http\Controllers\ModsController;
use App\Http\Controllers\ModsProfileController;
use App\Http\Controllers\CollectionsController;
use Illuminate\Support\Facades\Route;


Route::resource("mod", ModsController::class);
Route::get("/mods/{username}/{type}", [ModsProfileController::class, "get_mods_profile"]);


Route::get("/collections/{username}", [CollectionsController::class, "get_user_collections"]);
Route::post("/collections", [CollectionsController::class, "store"]);
Route::get("/collections/{collection_name}/{author}", [CollectionsController::class, "show"]);
Route::get("/collections/{collection}/edit", [CollectionsController::class, "edit"]);
Route::put("/collections/{collection}", [CollectionsController::class, "update"]);
Route::delete("/collections/{collection}", [CollectionsController::class, "destroy"]);