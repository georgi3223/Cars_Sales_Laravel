<?php
use App\Http\Controllers\CarsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SortController;


Route::get("/", function () {
    return view("layouts.app");
})->name("car-sale");

/* Login Page */
Route::get("/login", function () {
    return view("auth.login");
})->name("login");

/* Car Routes */
Route::resource("cars", CarsController::class);

/* Authentication Routes */
Auth::routes();

/* Search Route */
Route::get("/search", [CarsController::class, "search"])->name("search");

/* Store Car Route */
Route::post("/", [CarsController::class, "store"])->name("cars.store");

/* Search Form Route */
Route::get("/search", function () {
    return view("layouts.searchForm");
})->name("search");

/* Sorting Cars */
Route::get('/cars/sort', [SortController::class, 'sortCars'])->name('cars.sort');

/* Search Form Index Route */
Route::get("/search", [SearchController::class, "index"])->name("search.form");

/* Search Results Route */
Route::get("/search/results", [SearchController::class, "search"])->name("cars.search");

/* Profile Show Route */
Route::get("/profile", [ProfileController::class, "show"])->name("profile.show");

/* Update Car Route */
Route::put("/cars/{id}", [CarsController::class, "update"])->name("cars.update");

Route::get('/cars', [CarsController::class, 'index'])->name('cars.index');

