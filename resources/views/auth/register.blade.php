@extends('layouts.app')

@push('button-login')
<a href="{{ route('login') }}" class="text-white bg-forestgreen font-semibold rounded-xl text-sm px-6 py-3 text-center">Login</a>
@endpush

@section('content')

<section class="flex items-center justify-center px-10 pb-7">
    <div class="w-full max-w-lg">
        <h2 class="text-2xl font-bold text-center text-[#e2c044] mb-8 tracking-wider">
            REGISTRATION
        </h2>

        <form method="POST" action="{{ route('register') }}" class="w-full">

            @csrf

            <div class="border-2 border-[#5e7c64] rounded-3xl p-8 md:p-10 space-y-6">

                {{-- Name --}}
                <div>
                    <label for="name" class="block font-semibold text-md text-[#3b5440]">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                        class="w-full bg-transparent border-0 border-b-2 border-[#5e7c64] focus:ring-0 focus:border-[#3b5440] py-2 text-md">
                    @error('name')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Nickname --}}
                <div>
                    <label for="nickname" class="block font-semibold text-md text-[#3b5440]">Nickname</label>
                    <input id="nickname" type="text" name="nickname" value="{{ old('nickname') }}" required
                        class="w-full bg-transparent border-0 border-b-2 border-[#5e7c64] focus:ring-0 focus:border-[#3b5440] py-2 text-md">
                    @error('nickname')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block font-semibold text-md text-[#3b5440]">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                        class="w-full bg-transparent border-0 border-b-2 border-[#5e7c64] focus:ring-0 focus:border-[#3b5440] py-2 text-md">
                    @error('email')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Mobile Phone --}}
                <div>
                    <label for="mobile_phone" class="block font-semibold text-md text-[#3b5440]">Mobile Phone</label>
                    <input id="mobile_phone" type="tel" name="mobile_phone" value="{{ old('mobile_phone') }}" required placeholder="contoh : 085***"
                        class="w-full bg-transparent border-0 border-b-2 border-[#5e7c64] focus:ring-0 focus:border-[#3b5440] py-2 text-md">
                    @error('mobile_phone')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Gender --}}
                <div>
                    <label for="gender" class="block font-semibold text-md text-[#3b5440]">Gender</label>
                    <select id="gender" name="gender" required
                        class="w-full bg-transparent border-0 border-b-2 border-[#5e7c64] focus:ring-0 focus:border-[#3b5440] py-2 text-md">
                        <option value="">Select Gender</option>
                        <option value="male" @if(old('gender')=='male' ) selected @endif>Male</option>
                        <option value="female" @if(old('gender')=='female' ) selected @endif>Female</option>
                    </select>
                    @error('gender')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Date of Birth --}}
                <div>
                    <label for="dob" class="block font-semibold text-md text-[#3b5440]">Date of Birth</label>
                    <input id="dob" type="date" name="dob" value="{{ old('dob') }}" required
                        class="w-full bg-transparent border-0 border-b-2 border-[#5e7c64] focus:ring-0 focus:border-[#3b5440] py-2 text-md">
                    @error('dob')
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

                {{-- Confirm Password --}}
                <div>
                    <label for="password_confirmation" class="block font-semibold text-md text-[#3b5440]">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        class="w-full bg-transparent border-0 border-b-2 border-[#5e7c64] focus:ring-0 focus:border-[#3b5440] py-2 text-md">
                </div>

                {{-- Tombol Submit --}}
                <div class="pt-3">
                    <button type="submit" class="w-full bg-[#3b5440] text-white hover:bg-white hover:outline-2 hover:text-[#3b5440] font-bold py-3 px-6 rounded-full hover:bg-opacity-90 transition-all text-lg cursor-pointer">
                        REGISTER
                    </button>
                </div>

                <p class="text-center text-sm text-gray-600 mt-6">
                    if you already have an account,
                    <a href="{{ route('login') }}" class="text-[#3b5440] font-semibold hover:underline">Login Here</a>
                </p>

            </div>
        </form>

    </div>
</section>
<section class="flex items-center justify-center px-10 pb-7">
    <div class="w-full max-w-lg">
        <div class="flex justify-start">
            <h1 class="text-3xl sm:text-5xl md:text-6xl font-extrabold text-[#1f4a3e] leading-none">
                "New People,
            </h1>
        </div>

        <div class="flex justify-end mt-4">
            <h1 class="text-3xl sm:text-5xl md:text-6xl font-extrabold text-[#1f4a3e] leading-none">
                Real Connection"
            </h1>
        </div>

        <div class="flex items-center mt-10">
            <div class="flex-shrink-0">
                <img
                    src="{{ asset('assets/img/regist/aliana.png') }}"
                    alt="Aliana"
                    class="w-50 h-50 sm:w-36 sm:h-36">
            </div>
            <div class="text-xl sm:text-2xl font-normal text-[#1f4a3e] leading-relaxed">
                <p>Aliana</p>
                <p>BCA Bank</p>
                <p>27 years old</p>
            </div>
        </div>

        <div class="flex items-center justify-end mt-12">
            <div class="text-right text-xl sm:text-2xl font-normal text-[#1f4a3e] leading-relaxed">
                <p>Jeremy</p>
                <p>Cafe Owner</p>
                <p>35 years old</p>
            </div>
            <div class="flex-shrink-0">
                <img
                    src="{{ asset('assets/img/regist/jeremy.png') }}"
                    alt="Jeremy"
                    class="w-50 h-50 sm:w-36 sm:h-36">
            </div>
        </div>

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