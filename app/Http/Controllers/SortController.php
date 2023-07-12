<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class SortController extends Controller
{
    public function sortCars(Request $request)
    {
        $sortBy = $request->input("sort");

        $query = Car::query();

        switch ($sortBy) {
            case "price_low_to_high":
                $query->orderBy("price", "asc");
                break;
            case "price_high_to_low":
                $query->orderBy("price", "desc");
                break;
            case "year_low_to_high":
                $query->orderBy("year", "asc");
                break;
            case "year_high_to_low":
                $query->orderBy("year", "desc");
                break;
            case "created_at":
                $query->orderBy("created_at", "desc");
                break;
            default:
                // Default sorting: Most Relevant
                $query->orderBy("relevance_column", "desc");
                break;
        }

        $cars = $query->get();

        return view("cars.index", compact("cars"));
    }
}
