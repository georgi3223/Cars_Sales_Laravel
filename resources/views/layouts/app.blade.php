<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarSalesPage</title>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.1/dist/cdn.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <style>


  .fixed-mobile-menu {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 9999;
  }
    </style>
  </head>
  <body class="bg-gray-100">
    <!-- THIS IS HEADER-->
    <header>
      <!-- THIS IS NAVBAR-->
      <nav class="flex items-center justify-between py-4 bg-blue-500">
        <div class="pl-4">
          <a href="{{ route('cars.index') }}" class="text-white font-bold text-xl">CarSales</a>
        </div>
        <div class="lg:hidden">
          <button class="text-white pr-4 hover:text-gray-300 focus:outline-none" id="toggleButton">
            <span class="material-symbols-outlined">menu</span>
          </button>
          <div class="hidden py-2 fixed-mobile-menu" id="mobileMenu">
            <ul class="w-full h-48 p-5 bg-blue-500 shadow-xl text-center">
              <li class="mb-4">
                <a href="{{ route('cars.index') }}" class="text-white hover:text-gray-300">Cars</a>
              </li>
              <li class="mb-4">
                <a href="{{ route('search.form') }}" class="text-white hover:text-gray-300">Search</a>
              </li> @guest <li class="mb-4">
                <a href="{{ route('login') }}" class="text-white hover:text-gray-300">Login</a>
              </li> @else <li class="mb-4">
                <a href="{{ route('profile.show') }}" class="text-white hover:text-gray-300">Profile</a>
              </li>
              <li class="mb-4">
                <form action="{{ route('logout') }}" method="POST"> @csrf <button type="submit" class="text-white hover:text-gray-300">Logout</button>
                </form>
              </li> @endguest
            </ul>
          </div>
        </div>
        <div id="navbarNav" class="hidden lg:block pr-4">
          <ul class="lg:flex" style="margin-left: -12px;">
            <li class="lg:mr-6">
              <a href="{{ route('cars.index') }}" class="text-white hover:text-gray-300">Cars</a>
            </li>
            <li class="lg:mr-6">
              <a href="{{ route('search.form') }}" class="text-white hover:text-gray-300">Search</a>
            </li> @guest <li class="lg:mr-6">
              <a href="{{ route('login') }}" class="text-white hover:text-gray-300">Login</a>
            </li> @else <li>
            <li class="lg:mr-6">
              <a href="{{ route('profile.show') }}" class="text-white hover:text-gray-300">Profile</a>
            </li>
            </li>
            <form action="{{ route('logout') }}" method="POST"> @csrf <button type="submit" class="text-white hover:text-gray-300">Logout</button>
            </form>
            </li> @endguest
          </ul>
        </div>
      </nav>
    </header>
    <!-- SORT FORM-->
     @if(Route::is('cars.index')) <form action="{{ route('cars.sort') }}" method="GET" class="m-4">
      <div class="flex items-center">
        <label for="sort" class="
							<!--  -->mr-2 text-gray-700 text-sm font-bold">Sort By: </label>
        <div class="relative inline-block">
          <select name="sort" id="sort" class="block appearance-none w-32 py-2 px-3 border border-gray-300 rounded focus:outline-none focus:ring-blue-500 focus:border-blue-500">
            <option value="relevance" @if(request('sort')=='relevance' ) selected @endif>Most Relevant</option>
            <option value="price_low_to_high" @if(request('sort')=='price_low_to_high' ) selected @endif>Price: Low to High</option>
            <option value="price_high_to_low" @if(request('sort')=='price_high_to_low' ) selected @endif>Price: High to Low</option>
            <option value="year_low_to_high" @if(request('sort')=='year_low_to_high' ) selected @endif>Year: Low to High</option>
            <option value="year_high_to_low" @if(request('sort')=='year_high_to_low' ) selected @endif>Year: High to Low</option>
          </select>
        </div>
        <button type="submit" class="ml-4  bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Sort</button>
      </div>
    </form> @endif
    <!-- THIS IS MAIN SECTION-->
    <main class="{{ Route::is('cars.index') ? 'push-down' : '' }}"> @yield('content') </main>
  </body>
</html>