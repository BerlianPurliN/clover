@extends('layouts.app')
@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold text-center mb-6">Reset Your Password</h2>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ $email ?? old('email') }}">

        <div class="mb-4">
            <label for="password" class="block font-medium mb-2">New Password</label>
            <input id="password" type="password" name="password" required class="w-full border border-gray-300 rounded-lg p-3">
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="password-confirm" class="block font-medium mb-2">Confirm New Password</label>
            <input id="password-confirm" type="password" name="password_confirmation" required class="w-full border border-gray-300 rounded-lg p-3">
        </div>
        <div class="mt-6">
            <button type="submit" class="w-full bg-[#1c3f31] text-white py-3 rounded-lg">Reset Password</button>
        </div>
    </form>
</div>
@endsection