@extends('layouts.app') @section('content') 
<div class="flex justify-center items-center h-screen">
  <div class="w-full max-w-md">
    <div class="text-2xl mb-4">{{ __('Confirm Password') }}</div>
    <div class="bg-white shadow-md rounded px-8 py-6">
      <p class="mb-4">{{ __('Please confirm your password before continuing.') }}</p>
      <form method="POST" action="{{ route('password.confirm') }}"> 
        @csrf 
        <div class="mb-4">
          <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
          <input id="password" type="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                     focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('password') @enderror" name="password" required autocomplete="current-password"> @error('password') <span class="text-red-500 text-sm mt-1" role="alert">
            <strong>{{ $message }}</strong>
          </span> @enderror
        </div>
        <div class="flex items-center justify-between">
          <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-indigo-600">
            {{ __('Confirm Password') }}
          </button> @if (Route::has('password.request')) <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
          </a> @endif
        </div>
      </form>
    </div>
  </div>
</div> @endsection