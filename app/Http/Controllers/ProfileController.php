<?php

namespace App\Http\Controllers;
use App\Car;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    

public function show()
{
    $user = auth()->user();
    $cars = $user->cars;

    return view('layouts.profile', compact('cars'));
}
}
