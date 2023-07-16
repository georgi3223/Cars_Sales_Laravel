@extends('layouts.app') @section('content') <div class="container mx-auto py-8">
  <form method="POST" action="{{ route('cars.search') }}" enctype="multipart/form-data" class='bg-white shadow-md rounded p-10 w-full'>
  @csrf
    <h2 class="text-2xl font-semibold mb-6">Search Cars</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
         <div class="mb-4">
            <label for="make" class="block text-gray-700 text-sm font-bold mb-2">Make:</label>
            <select id="make" name="make" class="form-select block w-full py-2 px-3 border border-gray-300 rounded focus:outline-none focus:ring-blue-500 focus:border-blue-500">
               <option value="">All Makes</option>
               <option value="Audi">Audi</option>
               <option value="Bmw">BMW</option>
               <option value="Mercedes">Mercedes-Benz</option>
               <option value="Volkswagen">Volkswagen</option>
            </select>
         </div>
         <div class="mb-4">
            <label for="model" class="block text-gray-700 text-sm font-bold mb-2">Model:</label>
            <select id="model" name="model" class="form-select block w-full py-2 px-3 border border-gray-300 rounded focus:outline-none focus:ring-blue-500 focus:border-blue-500">
               <option value="">All Models</option>
            </select>
         </div>
         <div class="mb-4">
    <label for="year_from" class="block text-gray-700 text-sm font-bold mb-2">Year From:</label>
    <select name="year_from" id="year_from" class="form-select block w-full py-2 px-3 border border-gray-300 rounded focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        <option value="" selected hidden>Select year</option>
        <?php
        $currentYear = date('Y');
        for ($year = $currentYear; $year >= 1900; $year--) {
            echo '<option value="' . $year . '">' . $year . '</option>';
        }
        ?>
    </select>
</div>

<div class="mb-4">
    <label for="year_to" class="block text-gray-700 text-sm font-bold mb-2">Year To:</label>
    <select name="year_to" id="year_to" class="form-select block w-full py-2 px-3 border border-gray-300 rounded focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        <option value="" selected hidden>Select year</option>
        <?php
        $currentYear = date('Y');
        for ($year = $currentYear; $year >= 1900; $year--) {
            echo '<option value="' . $year . '">' . $year . '</option>';
        }
        ?>
    </select>
</div>
         <div class="mb-4">
            <label for="mileage" class="block text-gray-700 text-sm font-bold mb-2">Mileage:</label>
            <input type="number" name="mileage" id="mileage" class="form-input block w-full py-2 px-3 border border-gray-300 rounded focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Enter mileage">
         </div>
         <div class="mb-4">
            <label for="fueltype" class="block text-gray-700 text-sm font-bold mb-2">Fuel Type:</label>
            <select name="fueltype" id="fueltype" class="form-select block w-full py-2 px-3 border border-gray-300 rounded focus:outline-none focus:ring-blue-500 focus:border-blue-500">
               <option value="">Any</option>
               <option value="Gasoline">Gasoline</option>
               <option value="Diesel">Diesel</option>
               <option value="Electric">Electric</option>
            </select>
         </div>
         <div class="mb-4">
            <label for="drivetype" class="block text-gray-700 text-sm font-bold mb-2">Drive Type:</label>
            <select name="drivetype" id="drivetype" class="form-select block w-full py-2 px-3 border border-gray-300 rounded focus:outline-none focus:ring-blue-500 focus:border-blue-500">
               <option value="">Any</option>
               <option value="2wd">2WD</option>
               <option value="4wd">4WD</option>
            </select>
         </div>
         <div class="mb-4">
            <label for="engine" class="block text-gray-700 text-sm font-bold mb-2">Engine:</label>
            <select name="engine" id="engine" class="form-select block w-full py-2 px-3 border border-gray-300 rounded focus:outline-none focus:ring-blue-500 focus:border-blue-500">
               <option value="1.0L">1.0L</option>
               <option value="1.2L">1.2L</option>
               <option value="1.4L">1.4L</option>
               <option value="1.6L">1.6L</option>
               <option value="1.8L">1.8L</option>
               <option value="2.0L">2.0L</option>
               <option value="2.2L">2.2L</option>
               <option value="2.4L">2.4L</option>
               <option value="2.5L">2.5L</option>
               <option value="3.0L">3.0L</option>
               <option value="3.5L">3.5L</option>
               <option value="4.0L">4.0L</option>
               <option value="4.5L">4.5L</option>
               <option value="5.0L">5.0L</option>
               <option value="5.5L">5.5L</option>
               <option value="6.0L">6.0L</option>
            </select>
         </div>
         <div class="mb-4">
            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price:</label>
            <input type="number" name="price" id="price" class="form-input block w-full py-2 px-3 border border-gray-300 rounded focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Enter price">
         </div>
         <div class="mb-4">
            <label for="type" class="block text-gray-700 text-sm font-bold mb-2">Type:</label>
            <input type="text" name="type" id="type" class="form-input block w-full py-2 px-3 border border-gray-300 rounded focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Enter type">
         </div>
         <div class="mb-4">
            <label for="transmission" class="block text-gray-700 text-sm font-bold mb-2">Transmission:</label>
            <select name="transmission" id="transmission" class="form-select block w-full py-2 px-3 border border-gray-300 rounded focus:outline-none focus:ring-blue-500 focus:border-blue-500">
               <option value="">Any</option>
               <option value="manual">Manual</option>
               <option value="automatic">Automatic</option>
            </select>
         </div>
         <div class="mb-4">
            <label for="doors" class="block text-gray-700 text-sm font-bold mb-2">Doors:</label>
            <select name="doors" id="doors" class="form-select block w-full py-2 px-3 border border-gray-300 rounded focus:outline-none focus:ring-blue-500 focus:border-blue-500">
               <option value="">Any</option>
               <option value="2">2</option>
               <option value="4">4</option>
               <option value="5">5</option>
            </select>
         </div>
         <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
            <input type="text" name="description" id="description" class="form-input block w-full py-2 px-3 border border-gray-300 rounded focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Enter description">
         </div>
      </div>
    

      <div class="mb-4">
         <label class="block text-gray-700 text-sm font-bold mb-2">Features:</label>
         <div class="flex flex-wrap">
            <label class="inline-flex items-center mr-4">
               <input type="checkbox" name="features[]" value="air-conditioning" class="form-checkbox">
               <span class="ml-2">Air Conditioning</span>
            </label>
            <label class="inline-flex items-center mr-4">
               <input type="checkbox" name="features[]" value="power-windows" class="form-checkbox">
               <span class="ml-2">Power Windows</span>
            </label>
            <label class="inline-flex items-center mr-4">
               <input type="checkbox" name="features[]" value="power-locks" class="form-checkbox">
               <span class="ml-2">Power Locks</span>
            </label>
            <label class="inline-flex items-center mr-4">
               <input type="checkbox" name="features[]" value="keyless-entry" class="form-checkbox">
               <span class="ml-2">Keyless Entry</span>
            </label>
            <label class="inline-flex items-center mr-4">
               <input type="checkbox" name="features[]" value="backup-camera" class="form-checkbox">
               <span class="ml-2">Backup Camera</span>
            </label>
            <label class="inline-flex items-center mr-4">
               <input type="checkbox" name="features[]" value="navigation-system" class="form-checkbox">
               <span class="ml-2">Navigation System</span>
            </label>
            <label class="inline-flex items-center mr-4">
               <input type="checkbox" name="features[]" value="sunroof" class="form-checkbox">
               <span class="ml-2">Sunroof</span>
            </label>
            <label class="inline-flex items-center mr-4">
               <input type="checkbox" name="features[]" value="heated-seats" class="form-checkbox">
               <span class="ml-2">Heated Seats</span>
            </label>
            <label class="inline-flex items-center mr-4">
               <input type="checkbox" name="features[]" value="ventilated-seats" class="form-checkbox">
               <span class="ml-2">Ventilated Seats</span>
            </label>
            <label class="inline-flex items-center mr-4">
               <input type="checkbox" name="features[]" value="leather-seats" class="form-checkbox">
               <span class="ml-2">Leather Seats</span>
            </label>
         </div>
      </div>
    <!-- Submit Button -->
    <div class="mb-4">
      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Search</button>
    </div>
  </form>
</div> @endsection