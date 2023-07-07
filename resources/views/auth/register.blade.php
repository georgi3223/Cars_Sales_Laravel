@extends('layouts.app') @section('content') 
<div class="flex justify-center items-center h-screen">
  <div class="w-full max-w-md">
    <div>
      <form method="POST" action="{{ route('register') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"> 
        @csrf 
        <div class="text-2xl mb-4">{{ __('Register') }}</div>
        <div class="mb-4">
          <label for="name" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Name') }}</label>
          <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"> @error('name') <span role="alert" class="text-red-500 mt-2">
            <strong>{{ $message }}</strong>
          </span> @enderror
        </div>
        <div class="mb-4">
          <label for="email" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Email Address') }}</label>
          <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"> @error('email') <span role="alert" class="text-red-500 mt-2">
            <strong>{{ $message }}</strong>
          </span> @enderror
        </div>
        <div class="mb-4">
          <label for="password" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Password') }}</label>
          <input id="password" type="password" name="password" required autocomplete="new-password" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"> @error('password') <span role="alert" class="text-red-500 mt-2">
            <strong>{{ $message }}</strong>
          </span> @enderror
        </div>
        <div class="mb-4">
          <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Confirm Password') }}</label>
          <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="flex items-center justify-between">
          <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            {{ __('Register') }}
          </button>
        </div>
      </form>
    </div>
  </div>
</div> @endsection