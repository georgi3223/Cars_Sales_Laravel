@extends('layouts.app') @section('content') 
<div class="flex justify-center items-center h-screen">
  <div class="w-full max-w-md">
    <div class="text-2xl mb-4">{{ __('Verify Your Email Address') }}</div>
    <div class="bg-white shadow-md rounded px-8 py-6"> @if (session('resent')) <div class="bg-green-200 text-green-700 px-4 py-2 mb-4 rounded" role="alert">
        {{ __('A fresh verification link has been sent to your email address.') }}
      </div> @endif <p class="mb-4">{{ __('Before proceeding, please check your email for a verification link.') }}</p>
      <p class="mb-4">{{ __('If you did not receive the email') }},</p>
      <form class="mb-4" method="POST" action="{{ route('verification.resend') }}"> @csrf <button type="submit" class="text-blue-500 hover:underline focus:outline-none">{{ __('Click here to request another') }}</button>. </form>
    </div>
  </div>
</div> @endsection