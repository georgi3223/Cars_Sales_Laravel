@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <!-- Display flash messages -->
    @if (session('status'))
        <div class="bg-green-300 text-green-800 p-4 mb-4">
            {{ session('status') }}
        </div>
    @endif

    <!-- Form for sorting cars -->
    <form action="{{ route('cars.sort') }}" method="GET" class="m-4">
        <div class="flex items-center">
            <label for="sort" class="mr-2 text-gray-700 text-sm font-bold">Sort By:</label>
            <div class="relative inline-block">
                <select name="sort" id="sort" class="block appearance-none w-32 py-2 px-3 border border-gray-300 rounded focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <option value="relevance" @if(request('sort')=='relevance') selected @endif>Most Relevant</option>
                    <option value="price_low_to_high" @if(request('sort')=='price_low_to_high') selected @endif>Price: Low to High</option>
                    <option value="price_high_to_low" @if(request('sort')=='price_high_to_low') selected @endif>Price: High to Low</option>
                    <option value="year_low_to_high" @if(request('sort')=='year_low_to_high') selected @endif>Year: Low to High</option>
                    <option value="year_high_to_low" @if(request('sort')=='year_high_to_low') selected @endif>Year: High to Low</option>
                </select>
            </div>
            <button type="submit" class="ml-4 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Sort</button>
        </div>
    </form>

    <!-- Display car listings -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-5 gap-4">
        @foreach ($cars as $car)
        <div class="bg-white rounded-lg shadow-lg flex flex-col">
            <img src="{{ asset('storage/images/' . basename($car->image1)) }}" alt="Car Image 1" class="w-full h-auto object-cover rounded-t-md">
            <div class="p-4 flex flex-col justify-between flex-grow">
                <div>
                    <h5 class="text-lg font-bold mb-3 p-3 text-center car-details">{{ $car->make }} {{ $car->model }}</h5>
                    <p class="text-base car-details">
                        <strong>Price:</strong> {{ $car->price }}$
                    </p>
                    <p class="text-base car-details">
                        <strong>Year:</strong> {{ $car->year }}
                    </p>
                    <p class="text-base car-details">
                        <strong>Mileage:</strong> {{ $car->mileage }}
                    </p>
                    <p class="text-base car-details">
                        <strong>Fuel:</strong> {{ $car->fueltype }}
                    </p>
                </div>
                <a href="{{ route('cars.show', $car->id) }}" class="w-1/2 block mt-4 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline text-sm sm:text-base">View Details</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
