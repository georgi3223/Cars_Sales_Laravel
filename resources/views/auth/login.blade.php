@extends('layouts.app') @section('content') <div class="flex justify-center items-center h-screen">
  <div class="w-full max-w-md">
    <div>
      <form method="POST" action="{{ route('login') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"> 
        @csrf 
        <div class="text-2xl mb-4">{{ __('Login') }}</div>
        <div class="mb-4">
          <label for="email" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Email Address') }}</label>
          <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"> @error('email') <span role="alert" class="text-red-500 mt-2">
            <strong>{{ $message }}</strong>
          </span> @enderror
        </div>
        <div class="mb-4">
          <label for="password" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Password') }}</label>
          <input id="password" type="password" name="password" required autocomplete="current-password" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"> @error('password') <span role="alert" class="text-red-500 mt-2">
            <strong>{{ $message }}</strong>
          </span> @enderror
        </div>
        <div class="mb-4">
          <label for="remember" class="flex items-center">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="mr-2">
            <span class="text-sm text-gray-700">{{ __('Remember Me') }}</span>
          </label>
        </div>
        <div class="flex items-center justify-between">
          <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            {{ __('Login') }}
          </button>
          <a href="{{ route('register') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            {{ __('Register') }}
          </a>
        </div> @if (Route::has('password.request')) <div class="text-center mt-4">
          <a href="{{ route('password.request') }}" class="text-sm text-gray-600 hover:text-gray-900">{{ __('Forgot Your Password?') }}</a>
        </div> @endif
      </form>
    </div>
  </div>
</div> @endsection