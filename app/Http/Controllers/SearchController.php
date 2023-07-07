<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;

class SearchController extends Controller
{
    public function index()
    {
        return view('layouts.searchForm');
    }

    public function search(Request $request)
    {
        $make = $request->input('make');
        $model = $request->input('model');
        $yearFrom = $request->input('year_from');
        $yearTo = $request->input('year_to');
        $mileage = $request->input('mileage');
        $fuelType = $request->input('fueltype');
        $driveType = $request->input('drivetype');
        $engine = $request->input('engine');
        $price = $request->input('price');
        $type = $request->input('type');
        $transmission = $request->input('transmission');
        $doors = $request->input('doors');
        $description = $request->input('description');
        $features = $request->input('features');
    
        $query = Car::query();
    
       
   
    
        if ($make && is_array($make)) {
            $query->whereIn('make', $make);
        } elseif ($make) {
            $query->where('make', $make);
        }
        
        if ($model && is_array($model)) {
            $query->whereIn('model', $model);
        } elseif ($model) {
            $query->where('model', $model);
        }
        
        if ($yearFrom && $yearTo) {
            $query->whereBetween('year', [$yearFrom, $yearTo]);
        } else {
            if ($yearFrom) {
                $query->where('year', '>=', $yearFrom);
            }
    
            if ($yearTo) {
                $query->where('year', '<=', $yearTo);
            }
        }
    
        if ($mileage) {
            $query->where('mileage', '<=', $mileage);
        }
    
        if ($fuelType && is_array($fuelType)) {
            $query->whereIn('fueltype', $fuelType);
        }
    
        if ($driveType && is_array($driveType)) {
            $query->whereIn('drivetype', $driveType);
        }
    
        if ($engine && is_array($engine)) {
            $query->whereIn('engine', $engine);
        }
    
        if ($price) {
            $query->where('price', '<=', $price);
        }
    
        if ($type && is_array($type)) {
            $query->whereIn('type', $type);
        }
    
        if ($transmission && is_array($transmission)) {
            $query->whereIn('transmission', $transmission);
        }
    
        if ($doors && is_array($doors)) {
            $query->whereIn('doors', $doors);
        }
    
        if ($description) {
            $query->where('description', 'like', '%' . $description . '%');
        }
    
        if ($features && is_array($features)) {
            $query->where(function ($subquery) use ($features) {
                foreach ($features as $feature) {
                    $subquery->orWhere('features', 'like', '%' . $feature . '%');
                }
            });
        }
    
        $cars = $query->get();
        
        

        return view('cars.results', ['cars' => $cars]);
    }
       
}
