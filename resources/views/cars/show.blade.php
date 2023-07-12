@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
  <div class="bg-white p-8 rounded-lg">
    <h1 class="text-3xl mb-4">{{ $car->make }} {{ $car->model }}</h1>
    <!-- Display car details -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
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
        <strong>Fuel Type:</strong> {{ $car->fueltype }}
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
      <p>
        <strong>Drive Type:</strong> {{ $car->drivetype }}
      </p>
      <p>
        <strong>Description:</strong> {{ $car->description }}
      </p>
    </div>
    <div id="carousel" class="relative m-10">
      <div class="main-image flex justify-center">
        <!-- Main Image -->
        <img id="currentImage" src="{{ asset('storage/images/' . basename($car->image1)) }}" alt="Car Image" class="object-cover rounded-t-md">
      </div>
      <div class="flex justify-center mt-4">
        <!-- Buttons for Image Navigation -->
        <button id="prevBtn" class="carousel-button carousel-button-prev m-3 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-l">
          <span class="material-symbols-outlined">arrow_back_ios</span>
        </button>
        <button id="nextBtn" class="carousel-button carousel-button-next m-3 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-r">
          <span class="material-symbols-outlined">arrow_forward_ios</span>
        </button>
      </div>
    </div>
    <div id="carouselImages" class="hidden grid grid-cols-3 gap-4">
      <!-- Other Image URLs -->
      <img src="{{ asset('storage/images/' . basename($car->image2)) }}" class="carousel-image object-cover">
      <img src="{{ asset('storage/images/' . basename($car->image3)) }}" class="carousel-image object-cover">
      <img src="{{ asset('storage/images/' . basename($car->image4)) }}" class="carousel-image object-cover">
    </div>
  </div>
</div>
<div>
  @auth
  @if (Auth::user()->can('update', $car))
  <a href="{{ route('cars.edit', $car->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4 inline-block">Edit Car</a>
  @endif
  @endauth
</div>
@endsection
