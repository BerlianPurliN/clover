@extends('layouts.app')

@section('content')

<div class="flex min-h-screen">

    @include('components.sidebar')

    <main class="flex-1 p-4 md:p-8">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <div class="relative">
                <h1 class="text-xl md:text-3xl font-bold text-[#1c3f31]">Profile Info</h1>
            </div>
            <form method="POST" action="{{ route('customer.profile.update') }}" enctype="multipart/form-data" class="mt-10">
                @csrf
                @method('PATCH')

                {{-- Pesan Sukses --}}
                @if (session('status'))
                <div class="bg-green-100 border border-green-200 text-green-800 rounded-lg p-4 mb-6" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <div class="mt-10">
                    <h2 class="ttext-xl md:text-2xl font-semibold text-[#1c3f31] mb-6">About your Profile</h2>

                    <div class="mb-8">
                        <label class="block text-gray-600 font-medium mb-2">Profile Picture</label>
                        <div class="flex items-center space-x-4">
                            <img id="profileImage" class="h-24 w-24 rounded-full object-cover cursor-pointer" src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : 'https://i.pravatar.cc/150?u='.$user->email }}" alt="Profile picture">
                            <input type="file" name="profile_picture" id="profilePictureInput" class="hidden">
                        </div>
                        <p class="text-sm text-gray-500 mt-2">Klik gambar untuk mengganti. Maksimal 2MB.</p>
                        @error('profile_picture')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div>
                            <label for="name" class="block text-gray-600 font-medium mb-2">Name</label>
                            <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('name', $user->name) }}">
                            @error('name')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="nickname" class="block text-gray-600 font-medium mb-2">Nick Name</label>
                            <input type="text" id="nickname" name="nickname" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('nickname', $user->nickname) }}">
                            @error('nickname')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div>
                            <label for="birthday" class="block text-gray-600 font-medium mb-2">Birthday</label>
                            <input type="text" id="birthday" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old( 'dob',$user->dob )}}">
                        </div>
                        <div>
                            <label for="age" class="block text-gray-600 font-medium mb-2">Age</label>
                            <input type="text" id="age" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-red-500" readonly value="{{ $age }}">
                        </div>
                    </div>
                    <div class="mb-8">
                        <label for="mobile-phone" class="block text-gray-600 font-medium mb-2">Mobile Phone</label>
                        <input type="text" id="mobile-phone" name="mobile_phone" pattern="[0-9]*" inputmode="numeric" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('mobile_phone', $user->mobile_phone) }}">
                        @error('mobile_phone')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-8">
                        <label for="gender" class="block text-gray-600 font-medium mb-2">Gender</label>
                        <input type="text" id="gender" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-red-500" readonly value="{{ $user->gender }}">
                    </div>
                </div>
                <button>
                    <div type="submit" class="bg-[#1c3f31] text-white px-6 py-3 rounded-lg hover:bg-red-600 transition w-full text-center font-semibold">
                        Save Changes
                    </div>
                </button>

            </form>
        </div>
    </main>
</div>

<script>
    document.getElementById('profileImage').addEventListener('click', function() {
        document.getElementById('profilePictureInput').click();
    });

    document.getElementById('profilePictureInput').addEventListener('change', function(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('profileImage');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    });
</script>

@endsection