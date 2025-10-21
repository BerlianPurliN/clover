@extends('layouts.app')

@push('button-login')
<a href="{{ route('register') }}" class="text-white bg-forestgreen hover:bg-white hover:text-[#3b5440] hover:outline-2 font-semibold rounded-xl text-sm px-6 py-3 text-center">Register</a>
@endpush

@section('content')

<section class="flex items-center justify-center px-10">
    <div class="w-full max-w-lg">
        <h2 class="text-2xl font-bold text-center text-[#e2c044] mb-8 tracking-wider">
            LOGIN
        </h2>

        <form method="POST" action="{{ route('loginpost') }}">
            @csrf

            {{-- Kontainer form dengan border --}}
            <div class="border-2 border-[#5e7c64] rounded-3xl p-8 md:p-10 space-y-6">

                {{-- Email --}}
                <div>
                    <label for="email" class="block font-semibold text-md text-[#3b5440]">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full bg-transparent border-0 border-b-2 border-[#5e7c64] focus:ring-0 focus:border-[#3b5440] py-2 text-md">

                    {{-- Menampilkan error validasi atau error login gagal --}}
                    @error('email')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="block font-semibold text-md text-[#3b5440]">Password</label>
                    <input id="password" type="password" name="password" required
                        class="w-full bg-transparent border-0 border-b-2 border-[#5e7c64] focus:ring-0 focus:border-[#3b5440] py-2 text-md">
                    @error('password')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Tambahan: Lupa Password & Ingat Saya (Opsional) --}}
                <div class="flex items-center justify-between text-sm">
                    <label for="remember" class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="rounded border-gray-300 text-[#3b5440] shadow-sm focus:ring-[#5e7c64]">
                        <span class="ml-2 text-gray-600">Remember me</span>
                    </label>

                    <a href="{{ route('password.request') }}" class="font-medium text-[#3b5440] hover:underline">
                        Forgot Password?
                    </a>
                </div>



                {{-- Tombol Submit --}}
                <div class="pt-3">
                    <button type="submit" class="w-full bg-[#3b5440] text-white hover:bg-white hover:outline-2 hover:text-[#3b5440] font-bold py-3 px-6 rounded-full hover:bg-opacity-90 transition-all text-lg cursor-pointer">
                        LOGIN
                    </button>
                </div>

                <p class="text-center text-sm text-gray-600 mt-6">
                    if you don't have an account,
                    <a href="{{ route('register') }}" class="text-[#3b5440] font-semibold hover:underline">Register Here</a>
                </p>

            </div>
        </form>

    </div>
</section>

<section class="bg-forestgreen py-12 px-6 mt-12">
    <div class="max-w-4xl mx-auto">
        <div class="flex flex-row items-center justify-between gap-4">
            <div class="text-left">
                <h2 class="text-3xl font-bold text-mutedgold leading-tight">
                    Connect<br>With Us!
                </h2>
            </div>

            <div class="text-left">
                <p class="text-white font-semibold text-lg mb-2">Clover</p>
                <p class="text-white">E: teamsclover@gmail.com</p>
                <p class="text-white">P: 0823311345189</p>
            </div>
        </div>
    </div>
</section>

@endsection