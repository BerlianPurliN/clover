@extends('layouts.app')
@section('content')

<div class="max-w-md mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold text-center mb-6">Reset Password</h2>
    @if (session('status'))
    <div class="bg-green-100 text-green-800 p-4 rounded-md mb-4">{{ session('status') }}</div>
    @endif
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div>
            <label for="email" class="block font-medium mb-2">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full border border-gray-300 rounded-lg p-3">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mt-6">
            <button type="submit" class="w-full bg-[#1c3f31] hover:bg-white hover:text-[#3b5440] hover:outline-2 text-white py-3 rounded-lg">Send Password Reset Link</button>
        </div>
    </form>
</div>
@endsection