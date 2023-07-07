@extends('layouts.app')

@section('content')
<div class="container ">
  <h1 class="text-3xl font-bold mx-3 my-8">Search Results</h1>
  @if ($cars->isEmpty())
  <div class="flex justify-center">
    <p class="text-center">No results found.</p>
  </div>
  @else
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-5 gap-4 mx-4 my-8"> @foreach ($cars as $car) <div class="bg-white rounded-lg shadow-lg flex flex-col">
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
        <a href="{{ route('cars.show', $car->id) }}" class="w-1/2 block mt-4   bg-blue-500 hover:bg-blue-600 text-white font-bold py-2
                 px-4 rounded focus:outline-none focus:shadow-outline text-sm sm:text-base">View Details</a>
      </div>
    </div>
    @endforeach
  </div>
  @endif
</div>
@endsection
