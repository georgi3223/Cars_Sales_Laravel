@extends('layouts.app')

@section('content')
  <!-- User Profile Section -->
  <div class="container mx-auto px-4 py-8 sm:w-full md:w-1/4 text-center">
    <div class="bg-white shadow-md rounded-lg p-4">
      <h2 class="text-lg font-semibold mb-2">User Information</h2>
      <p>
        <strong>Username:</strong> {{ Auth::user()->name }}
      </p>
      <p>
        <strong>Email:</strong> {{ Auth::user()->email }}
      </p>
      <div class="mt-4">
        <a href="{{ route('cars.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded">Upload Ad</a>
      </div>
    </div>
  </div>

  <div class="container m-auto px-4 py-8">
    <!-- Your Ads Section -->
    <h2 class="text-lg font-semibold mb-2">Your Ads</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
      @foreach($cars as $car)
        <div class="bg-white shadow-md rounded-lg p-4">
          <div class="flex flex-col justify-between items-center mb-4">
            <h3 class="text-xl font-semibold">{{ $car->make }} {{ $car->model }}</h3>
          </div>
          <div class="grid grid-cols-2 gap-2 mt-4">
            <p>
              <strong>Price:</strong> ${{ $car->price }}
            </p>
            <p>
              <strong>Year:</strong> {{ $car->year }}
            </p>
            <p>
              <strong>Mileage:</strong> {{ $car->mileage }}
            </p>
            <p>
              <strong>Description:</strong> {{ $car->description }}
            </p>
            <p>
              <strong>Fuel Type:</strong> {{ $car->fueltype }}
            </p>
            <p>
              <strong>Drive Type:</strong> {{ $car->drivetype }}
            </p>
            <p>
              <strong>Engine:</strong> {{ $car->engine }}
            </p>
            <p>
              <strong>Type:</strong> {{ $car->type }}
            </p>
            <p>
              <strong>Transmission:</strong> {{ $car->transmission }}
            </p>
            <p>
              <strong>Doors:</strong> {{ $car->doors }}
            </p>
            <p>
              <strong>Features:</strong> {{ implode(', ', json_decode($car->features)) }}
            </p>
          </div>
          <div class="flex mt-4 md:mt-0">
            <a href="{{ route('cars.edit', $car->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded mr-2">Edit</a>
            <form action="{{ route('cars.destroy', $car->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded">Delete</button>
            </form>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
