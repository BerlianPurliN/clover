@extends('layouts.app')

@push('button-login')
<a href="{{ route('loginpage') }}" class="text-white bg-forestgreen font-semibold rounded-xl text-sm px-6 py-3 text-center">Login</a>
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
                    <input id="mobile_phone" type="tel" name="mobile_phone" value="{{ old('mobile_phone') }}" required
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
                <div class="pt-6">
                    <button type="submit" class="w-full bg-[#3b5440] text-white font-bold py-3 px-6 rounded-full hover:bg-opacity-90 transition-all text-lg cursor-pointer">
                        SUBMIT
                    </button>
                </div>

            </div>
        </form>

    </div>
</section>

@endsection