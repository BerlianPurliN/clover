@extends('layouts.app')

@section('content')

<div class="flex min-h-screen">

    @include('components.sidebar')
    <main class="flex-1 p-4 md:p-8">
        <div class="max-w-4xl mx-auto space-y-8">

            {{-- BAGIAN 1: FORMULIR BUAT JANJI TEMU --}}
            <div class="bg-white p-8 rounded-lg shadow-lg">
                @if ($canCreateAppointment)
                <h1 class="text-xl md:text-3xl font-bold text-[#1c3f31] mb-6">Create New Appointment</h1>

                <form method="POST" action="{{ route('appointment.store') }}">
                    @csrf
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="appointment_date" class="block text-xs md:text-lg text-gray-600 font-medium mb-2">Choose Date</label>
                                <input type="date" id="appointment_date" name="appointment_date"
                                    class="w-full border text-xs md:text-lg border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-green-500"
                                    value="{{ old('appointment_date') }}" required>
                                @error('appointment_date')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="appointment_time" class="block text-xs md:text-lg text-gray-600 font-medium mb-2">Choose Time</label>

                                <div class="relative">
                                    <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                                        <svg class="md:w-5 md:h-5 h-4 w-4 text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </div>

                                    <input type="time" id="appointment_time" name="appointment_time"
                                        class="text-xs md:text-lg w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-green-500"
                                        value="{{ old('appointment_time') }}" required>
                                </div>

                                @error('appointment_time')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="w-full btn-submit md:!mt-6">
                            Submit Request
                        </button>
                    </div>
                </form>

                @else
                <h1 class="text-xl md:text-3xl font-bold text-[#1c3f31] mb-4">Active Appointment Request</h1>
                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-r-lg">
                    <p class="font-semibold text-yellow-800">You already have an active request.</p>
                    <p class="text-yellow-700">Please wait until your current appointment is processed before creating a new one.</p>
                    <div class="mt-3 text-sm">
                        <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($lastAppointment->appointment_date)->format('l, d F Y') }} at {{ \Carbon\Carbon::parse($lastAppointment->appointment_time)->format('H:i') }}</p>
                        <p><strong>Status:</strong> {{ $lastAppointment->status }}</p>
                    </div>
                </div>
                @endif

            </div>

            {{-- BAGIAN 2: RIWAYAT JANJI TEMU --}}
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h2 class="text-lg md:text-xl font-bold text-[#1c3f31] mb-6">Appointment History</h2>
                <div class="space-y-4">

                    @forelse ($appointments as $appointment)
                    <div class="flex items-center justify-between border-b pb-3">
                        <div>
                            <p class="font-semibold text-gray-800">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('l, d F Y') }}</p>
                            <p class="text-sm text-gray-500">at {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('H:i') }}</p>

                            @if ($appointment->admin_notes)
                            <div class="mt-3 p-3 bg-yellow-50 border-l-4 border-yellow-400 rounded-r-md">
                                <p class="text-xs uppercase tracking-wider font-bold text-yellow-700">Catatan dari Admin</p>
                                <p class="text-sm text-gray-700 mt-1">{{ $appointment->admin_notes }}</p>
                            </div>
                            @endif
                        </div>
                        <div>
                            @php
                            $statusClass = '';
                            switch ($appointment->status) {
                            case 'Approved':
                            $statusClass = 'bg-green-100 text-green-800';
                            break;
                            case 'Rejected':
                            $statusClass = 'bg-red-100 text-red-800';
                            break;
                            case 'Under Review':
                            $statusClass = 'bg-yellow-100 text-yellow-800';
                            break;
                            default:
                            $statusClass = 'bg-gray-100 text-gray-800';
                            }
                            @endphp
                            <span class="px-3 py-1 text-sm font-medium rounded-full {{ $statusClass }}">
                                {{ $appointment->status }}
                            </span>
                        </div>

                    </div>
                    @empty
                    <p class="text-gray-500 text-center">You have no appointment history yet.</p>
                    @endforelse

                </div>
            </div>
        </div>
    </main>


</div>

@endsection