@extends('layouts.app')

@section('content')

<div class="flex min-h-screen">

    <main class="flex-1 p-4 md:p-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-[#1c3f31]">User Detail: {{ $user->name }}</h1>
            <a href="{{ url()->previous() }}" class="bg-[#1c3f31] p-2 rounded-lg text-white hover:text-black hover:bg-white">&larr; Back</a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Kolom Kiri: Info User (Tidak ada perubahan) --}}
            <div class="lg:col-span-1 bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-bold text-[#1c3f31] mb-4 border-b pb-2">User Information</h2>
                <div class="flex justify-center mb-4">
                    <img class="h-32 w-32 rounded-full object-cover"
                        src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&background=1c3f31&color=fff' }}"
                        alt="Profile Picture">
                </div>
                <div class="space-y-3 text-sm">
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Nickname:</strong> {{ $user->nickname }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Gender:</strong> {{ ucfirst($user->gender) }}</p>
                    <p><strong>Date of Birth:</strong> {{ $user->dob ? \Carbon\Carbon::parse($user->dob)->format('d F Y') : '-' }}</p>
                    <p><strong>Registered On:</strong> {{ $user->created_at->format('d F Y') }}</p>
                </div>
            </div>

            {{-- Kolom Kanan: Info Kuesioner (SUDAH DIPERBAIKI) --}}
            <div class="lg:col-span-2 bg-white p-6 rounded-lg shadow-lg space-y-8">

                {{-- BAGIAN 1: DATA KUESIONER PENGGUNA --}}
                <div>
                    <h2 class="text-xl font-bold text-[#1c3f31] mb-4 border-b pb-2">Questionnaire Data</h2>
                    @if ($user->questionnaire)
                    <div class="space-y-3 text-sm grid grid-cols-1 md:grid-cols-2 gap-x-6">
                        {{-- GAMBAR BUSINESS CARD YANG SALAH SUDAH DIHAPUS DARI SINI --}}
                        <p><strong>Height:</strong> {{ $user->questionnaire->height ?? '-' }} cm</p>
                        <p><strong>Religion:</strong> {{ ucfirst($user->questionnaire->religion) ?? '-' }}</p>
                        <p><strong>Ethnicity:</strong> {{ ucfirst($user->questionnaire->ethnicity) ?? '-' }}</p>
                        <p><strong>Marital Status:</strong> {{ ucfirst($user->questionnaire->marital_status) ?? '-' }}</p>
                        <p><strong>Occupation:</strong> {{ ucfirst($user->questionnaire->occupation) ?? '-' }}</p>
                        <p><strong>Company:</strong> {{ $user->questionnaire->company ?? '-' }}</p>
                        <p><strong>Job Position:</strong> {{ $user->questionnaire->job_position ?? '-' }}</p>
                        <p><strong>Income:</strong> {{ $user->questionnaire->income ?? '-' }}</p>
                    </div>
                    @else
                    <p class="text-gray-500">This user has not completed the questionnaire yet.</p>
                    @endif
                </div>

                {{-- BAGIAN 2: ATTACHMENTS (Bagian ini sudah benar dan dipertahankan) --}}
                @if ($user->questionnaire)
                <div>
                    <h2 class="text-xl font-bold text-[#1c3f31] mb-4 border-b pb-2">Attachments</h2>
                    <div>
                        <p class="font-medium text-gray-700 mb-2">Business Card:</p>
                        @if ($user->questionnaire->business_card)
                        <img class="max-w-xs rounded-lg shadow-md border"
                            src="{{ asset('storage/' . $user->questionnaire->business_card) }}"
                            alt="Business Card">
                        @else
                        <p class="text-sm text-gray-500">No business card uploaded.</p>
                        @endif
                    </div>
                </div>
                @endif

                {{-- BAGIAN 3: PARTNER DATA (Tidak ada perubahan) --}}
                @if ($user->questionnaire)
                <div>
                    <h2 class="text-xl font-bold text-[#1c3f31] mb-4 border-b pb-2">Partner Data</h2>
                    <div class="space-y-3 text-sm grid grid-cols-1 md:grid-cols-2 gap-x-6">
                        <p><strong>Pref. Height:</strong> {{ $user->questionnaire->partner_height ?? '-' }} cm</p>
                        <p><strong>Pref. Religion:</strong> {{ ucfirst($user->questionnaire->partner_religion) ?? '-' }}</p>
                        <p><strong>Pref. Ethnicity:</strong> {{ ucfirst($user->questionnaire->partner_ethnicity) ?? '-' }}</p>
                        <p><strong>Pref. Marital Status:</strong> {{ ucfirst($user->questionnaire->partner_marital_status) ?? '-' }}</p>
                        <p><strong>Pref. Occupation:</strong> {{ ucfirst($user->questionnaire->partner_occupation) ?? '-' }}</p>
                        <p><strong>Pref. Income:</strong> {{ $user->questionnaire->partner_income ?? '-' }}</p>
                        <div class="md:col-span-2 mt-2">
                            <p><strong>Partner Description:</strong><br>{{ $user->questionnaire->partner_description ?? '-' }}</p>
                        </div>
                        <div class="md:col-span-2 mt-2">
                            <p><strong>Partner Priority:</strong><br>{{ str_replace(',', ', ', $user->questionnaire->partner_priority) ?? '-' }}</p>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </main>

</div>

@endsection

@push('scripts')
@endpush