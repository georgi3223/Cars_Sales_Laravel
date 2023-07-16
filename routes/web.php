<?php
use App\Http\Controllers\CarsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SortController;


Route::get("/", function () {
    return view("layouts.app");
});

//Car Routes 
Route::resource("cars", CarsController::class);

// Authentication Routes 
Auth::routes();

// Sorting Cars 
Route::post('/cars/sort', [SortController::class, 'sortCars'])->name('cars.sort');

// Search Form Index Route 
Route::get("/search", [SearchController::class, "index"])->name("search.form");

// Search Results Route 
Route::post("/search/results", [SearchController::class, "search"])->name("cars.search");

// Profile Show Route 
Route::get("/profile", [ProfileController::class, "show"])->name("profile.show");

// Update Car Route 
Route::put("/cars/{id}", [CarsController::class, "update"])->name("cars.update");

