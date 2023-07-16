@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center h-screen">
  <div class="w-full max-w-md">
    <div class="text-2xl mb-4">{{ __('Reset Password') }}</div>
    <div class="bg-white shadow-md rounded px-8 py-6">
      <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="mb-4">
          <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email Address') }}</label>
          <input id="email" type="email" class="mt-1 block w-full rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('email') border-red-500 @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
          @error('email')
          <span class="text-red-500 text-sm mt-1" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="mb-4">
          <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
          <input id="password" type="password" class="mt-1 block w-full rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password">
          @error('password')
          <span class="text-red-500 text-sm mt-1" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="mb-4">
          <label for="password-confirm" class="block text-sm font-medium text-gray-700">{{ __('Confirm Password') }}</label>
          <input id="password-confirm" type="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="password_confirmation" required autocomplete="new-password">
        </div>
        <div class="flex items-center justify-between">
          <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-indigo-600">
            {{ __('Reset Password') }}
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
