@extends('layouts.app')

@section('content')

<div class="flex min-h-screen">

    @include('components.sidebar')

    <main class="flex-1 p-4 md:p-8">
        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-[#1c3f31] mb-5">Manage Users</h1>

        <div class="bg-white md:p-6 p-1 rounded-lg shadow-lg">

            <form method="GET" action="{{ route('admin.manage.users.index') }}" class="mb-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- Kolom Search --}}
                    <div class="md:col-span-1">
                        <label for="search" class="sr-only">Search</label>
                        <input type="text" name="search" id="search" class="text-xs w-full border border-gray-300 rounded-lg p-3"
                            placeholder="Search by name, nickname, or email..." value="{{ request('search') }}">
                    </div>
                    {{-- Kolom Filter Gender --}}
                    <div class="md:col-span-1">
                        <label for="gender" class="sr-only">Filter by Gender</label>
                        <select name="gender" id="gender" class="text-xs w-full border border-gray-300 rounded-lg p-3">
                            <option value="">All Genders</option>
                            <option value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                    {{-- Tombol --}}
                    <div class="flex flex-wrap md:max-w-md items-center justify-center gap-2 mt-4">
                        <button type="submit" class="bg-[#1c3f31] hover:bg-white hover:text-[#1c3f31] hover:outline-2 text-white font-semibold py-2 px-4 rounded-lg text-xs md:text-sm transition duration-150 ease-in-out">Filter</button>
                        <a href="{{ route('admin.manage.users.index') }}" class="bg-gray-200 hover:bg-white hover:outline-2 font-semibold py-2 px-4 rounded-lg text-xs md:text-sm transition duration-150 ease-in-out">Reset</a>
                        <a href="{{ route('admin.users.export', request()->query()) }}"
                            class="bg-green-600 hover:bg-white hover:outline-2 hover:text-black text-white font-semibold py-2 px-4 rounded-lg text-xs md:text-sm transition duration-150">
                            Export All to Excel
                        </a>
                    </div>
                </div>
            </form>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-50 mb-2   ">
                        <tr>
                            <th class="md:px-6 md:py-3 px-2 py-1 text-left md:text-sm text-xs font-medium text-gray-500 uppercase tracking-wider">Profile</th>
                            <th class="md:px-6 md:py-3 px-2 py-1 text-left md:text-sm text-xs font-medium text-gray-500 uppercase tracking-wider">Nickname</th>
                            <th class="md:px-6 md:py-3 px-2 py-1 text-left md:text-sm text-xs font-medium text-gray-500 uppercase tracking-wider">Gender</th>
                            <th class="md:px-6 md:py-3 px-2 py-1 text-left md:text-sm text-xs font-medium text-gray-500 uppercase tracking-wider">Date of Birth</th>
                            <th class="md:px-6 md:py-3 px-2 py-1 text-right md:text-sm text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($users as $user)
                        <tr>
                            <td class="px-2 md:px-6 py-4 whitespace-nowrap">
                                <img class="h-10 w-10 md:h-15 md:w-15  rounded-full object-cover" src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : 'https://ui-avatars.com/api/?name='.urlencode($user->name) }}" alt="Avatar">
                            </td>
                            <td class="md:px-6 md:py-4 px-2 py-1 whitespace-nowrap text-sm font-medium text-gray-900">{{ $user->nickname }}</td>
                            <td class="md:px-6 md:py-4 px-2 py-1 whitespace-nowrap text-sm text-gray-500">{{ ucfirst($user->gender) }}</td>
                            <td class="md:px-6 md:py-4 px-2 py-1 whitespace-nowrap text-sm text-gray-500">{{ $user->dob ? \Carbon\Carbon::parse($user->dob)->format('d F Y') : '-' }}</td>
                            <td class="md:px-6 md:py-4 px-2 py-1 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('admin.manage.users.show', $user->id) }}" class="hover:bg-white hover:text-[#1c3f31] hover:outline-2 text-white bg-[#1c3f31] hover:bg-opacity-80 px-4 py-2 rounded-md">
                                    Detail
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">No users found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $users->links() }}
            </div>
        </div>
    </main>

</div>

@endsection

@push('scripts')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush