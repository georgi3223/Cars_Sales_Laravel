@extends('layouts.app') @section('content')
 <div class="flex justify-center items-center h-screen bg-gray-100">
  <div class="w-full max-w-md">
    <div class="bg-white rounded px-8 py-6">
      <div class="text-2xl mb-4">{{ __('Reset Password') }}</div> @if (session('status')) <div class="text-green-600 text-sm mb-4" role="alert">
        {{ session('status') }}
      </div> @endif <form method="POST" action="{{ route('password.email') }}"> 
        @csrf 
        <div class="mb-4">
          <label for="email" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Email Address') }}</label>
          <input id="email" type="email" class="border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-blue-500 @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> @error('email') <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p> @enderror
        </div>
        <div class="flex items-center justify-between">
          <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            {{ __('Send Password Reset Link') }}
          </button>
        </div>
      </form>
    </div>
  </div>
</div> @endsection