@extends('layouts.app')

@section('content')

<div class="flex min-h-screen">

    @include('components.sidebar')

    <main class="flex-1 p-4 md:p-8">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <div class="relative">
                <h1 class="text-xl md:text-3xl font-bold text-[#1c3f31]">Questionnaire</h1>
                <form method="POST" action="{{ route('questionnaire.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-10">

                        {{-- Personal Information --}}
                        <div class="personal-information">
                            <div class="mb-8">
                                <label for="name" class="block text-gray-600 font-medium text-sm md:text-lg mb-2">Name</label>
                                <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('name', Auth::user()->name) }}">
                            </div>
                            <div class=" mb-8">
                                <label for="mobile-phone" class="block text-gray-600 font-medium text-sm md:text-lg mb-2">Mobile Phone</label>
                                <input type="tel" id="mobile-phone" name="mobile_phone" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('mobile_phone', Auth::user()->mobile_phone) }}">
                            </div>
                            <div class="mb-8">
                                <label for="email" class="block text-gray-600 font-medium text-sm md:text-lg mb-2">Email</label>
                                <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-red-500" readonly value="{{ old( 'email',Auth::user()->email )}}">
                            </div>
                            <div class="mb-8">
                                <label for="gender" class="block text-gray-600 font-medium text-sm md:text-lg mb-2">Jenis Kelamin / Gender</label>
                                <input type="text" id="gender" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-red-500" readonly value="{{ old( 'gender',Auth::user()->gender )}}">
                            </div>
                            <div class="mb-8">
                                <label for="height" class="block text-gray-600 font-medium text-sm md:text-lg mb-2">Tinggi (cm) / Height (cm)</label>
                                <input type="number" id="height" name="height" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('height') }}">
                            </div>
                            <div class="mb-8">
                                <label for="nationality" class="block text-gray-600 font-medium text-sm md:text-lg mb-2">Kewarganegaraan / Nationality</label>
                                <input type="text" id="nationality" name="nationality" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('nationality') }}">
                            </div>
                            <div class="mb-8">
                                <label class="block text-gray-600 font-medium mb-2">Agama</label>
                                <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-6">

                                    <div class="flex items-center">
                                        <input type="radio" id="religion_islam" name="religion" value="islam"
                                            class="h-4 w-4 text-red-500 border-gray-300 focus:ring-red-500"
                                            {{-- Logika untuk 'old' value --}}
                                            @if(old('religion')=='islam' ) checked @endif>
                                        <label for="religion_islam" class="ml-2 text-gray-700">Islam</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input type="radio" id="religion_catholic" name="religion" value="katolik"
                                            class="h-4 w-4 text-red-500 border-gray-300 focus:ring-red-500"
                                            {{-- Logika untuk 'old' value --}}
                                            @if(old('religion')=='katolik' ) checked @endif>
                                        <label for="religion_catholic" class="ml-2 text-gray-700">Katolik</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input type="radio" id="religion_confucius" name="religion" value="konghucu"
                                            class="h-4 w-4 text-red-500 border-gray-300 focus:ring-red-500"
                                            {{-- Logika untuk 'old' value --}}
                                            @if(old('religion')=='konghucu' ) checked @endif>
                                        <label for="religion_confucius" class="ml-2 text-gray-700">Konghucu</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input type="radio" id="religion_buddha" name="religion" value="buddha"
                                            class="h-4 w-4 text-red-500 border-gray-300 focus:ring-red-500"
                                            {{-- Logika untuk 'old' value --}}
                                            @if(old('religion')=='buddha' ) checked @endif>
                                        <label for="religion_buddha" class="ml-2 text-gray-700">Buddha</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input type="radio" id="religion_kristen" name="religion" value="kristen"
                                            class="h-4 w-4 text-red-500 border-gray-300 focus:ring-red-500"
                                            @if(old('religion')=='kristen' ) checked @endif>
                                        <label for="religion_kristen" class="ml-2 text-gray-700">Kristen</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input type="radio" id="religion_hindu" name="religion" value="hindu"
                                            class="h-4 w-4 text-red-500 border-gray-300 focus:ring-red-500"
                                            @if(old('religion')=='hindu' ) checked @endif>
                                        <label for="religion_hindu" class="ml-2 text-gray-700">Hindu</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-8">
                                <label for="current-city" class="block text-gray-600 font-medium text-sm md:text-lg mb-2">Kota, Negara Domisili / Current City, Region</label>
                                <input type="text" id="current-city" name="current_city" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('current_city') }}">
                            </div>
                            <div class="mb-8">
                                <label class="block text-gray-600 font-medium text-sm md:text-lg mb-2">Status Pernikahan / Marital Status</label>
                                <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-6">

                                    <!-- Opsi Belum Menikah -->
                                    <div class="flex items-center">
                                        <input type="radio" id="status_belum_menikah" name="marital_status" value="belum_menikah"
                                            class="h-4 w-4 text-red-500 border-gray-300 focus:ring-red-500"
                                            @if(old('marital_status')=='belum_menikah' ) checked @endif>
                                        <label for="status_belum_menikah" class="ml-2 text-gray-700">Belum Menikah</label>
                                    </div>

                                    <!-- Opsi Menikah -->
                                    <div class="flex items-center">
                                        <input type="radio" id="status_menikah" name="marital_status" value="menikah"
                                            class="h-4 w-4 text-red-500 border-gray-300 focus:ring-red-500"
                                            @if(old('marital_status')=='menikah' ) checked @endif>
                                        <label for="status_menikah" class="ml-2 text-gray-700">Menikah</label>
                                    </div>

                                    <!-- Opsi Cerai -->
                                    <div class="flex items-center">
                                        <input type="radio" id="status_cerai" name="marital_status" value="cerai"
                                            class="h-4 w-4 text-red-500 border-gray-300 focus:ring-red-500"
                                            @if(old('marital_status')=='cerai' ) checked @endif>
                                        <label for="status_cerai" class="ml-2 text-gray-700">Cerai</label>
                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- Work Information --}}
                        <div class="work-information">
                            <h3 class="text-md md:text-xl font-semibold text-gray-800 mt-12 mb-4 border-b pb-2">Work Information</h3>
                            <div class="mb-8">
                                <label for="company-name" class="block text-gray-600 font-medium text-sm md:text-lg mb-2">Nama Perusahaan / Company Name</label>
                                <input type="text" id="company-name" name="company_name" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('company_name') }}">
                            </div>
                            <div class="mb-8">
                                <label for="job-title" class="block text-gray-600 font-medium text-sm md:text-lg mb-2">Jabatan / Title</label>
                                <input type="text" id="job-title" name="job_title" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('job_title') }}">
                            </div>
                            <div class="mb-8">
                                <label class="block text-gray-600 font-medium text-sm md:text-lg mb-2">Pendapatan / Income</label>
                                <div class="flex flex-col space-y-2">

                                    <!-- Opsi < 5 Juta -->
                                    <div class="flex items-center">
                                        <input type="radio" id="income_1" name="income" value="<5jt"
                                            class="h-4 w-4 text-red-500 border-gray-300 focus:ring-red-500"
                                            @if(old('income')=='<5jt' ) checked @endif>
                                        <label for="income_1" class="ml-2 text-gray-700">&lt; Rp 5.000.000</label>
                                    </div>

                                    <!-- Opsi 5jt - 10jt -->
                                    <div class="flex items-center">
                                        <input type="radio" id="income_2" name="income" value="5-10jt"
                                            class="h-4 w-4 text-red-500 border-gray-300 focus:ring-red-500"
                                            @if(old('income')=='5-10jt' ) checked @endif>
                                        <label for="income_2" class="ml-2 text-gray-700">Rp 5.000.000 - Rp 10.000.000</label>
                                    </div>

                                    <!-- Opsi 10jt - 20jt -->
                                    <div class="flex items-center">
                                        <input type="radio" id="income_3" name="income" value="10-20jt"
                                            class="h-4 w-4 text-red-500 border-gray-300 focus:ring-red-500"
                                            @if(old('income')=='10-20jt' ) checked @endif>
                                        <label for="income_3" class="ml-2 text-gray-700">Rp 10.000.000 - Rp 20.000.000</label>
                                    </div>

                                    <!-- Opsi > 20jt -->
                                    <div class="flex items-center">
                                        <input type="radio" id="income_4" name="income" value=">20jt"
                                            class="h-4 w-4 text-red-500 border-gray-300 focus:ring-red-500"
                                            @if(old('income')=='>20jt' ) checked @endif>
                                        <label for="income_4" class="ml-2 text-gray-700">&gt; Rp 20.000.000</label>
                                    </div>

                                    <!-- Opsi Lainnya -->
                                    <div class="flex items-center">
                                        <input type="radio" id="income_5" name="income" value="lewati"
                                            class="h-4 w-4 text-red-500 border-gray-300 focus:ring-red-500"
                                            @if(old('income')=='lewati' ) checked @endif>
                                        <label for="income_5" class="ml-2 text-gray-700">Lewati</label>
                                    </div>

                                </div>
                            </div>
                            <div class="mb-8">
                                <label for="business-card" class="block text-gray-600 font-medium text-sm md:text-lg mb-2">Unggah kartu nama Anda disini / Share your business card here</label>
                                <input type="file" id="business-card" name="business_card" class="w-full text-gray-600 file:ml-2 file:mt-5 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#1c3f31] file:text-white hover:file:bg-white hover:file:text-black" value="{{ old('business_card') }}">
                            </div>
                        </div>

                        {{-- Education --}}
                        <div class="education">
                            <h3 class="text-md md:text-xl font-semibold text-gray-800 mt-12 mb-4 border-b pb-2">Education</h3>
                            <div class="mb-8">
                                <label for="education" class="block text-gray-600 font-medium text-sm md:text-lg mb-2">Pendidikan Terakhir / Highest Education</label>
                                <input type="text" id="education" name="education" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('education') }}">
                            </div>
                            <div class="mb-8">
                                <label for="school-name" class="block text-gray-600 font-medium text-sm md:text-lg mb-2">Nama Sekolah / School Name</label>
                                <input type="text" id="school-name" name="school_name" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('school_name') }}">
                            </div>
                            <div class="mb-8">
                                <label for="major" class="block text-gray-600 font-medium text-sm md:text-lg mb-2">Program Studi / Major</label>
                                <input type="text" id="major" name="major" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('major') }}">
                            </div>
                        </div>

                        {{-- About & Preferences --}}
                        <div class="about-preferences">
                            <h3 class="text-md md:text-xl font-semibold text-gray-800 mt-12 mb-4 border-b pb-2">About You & Your Preferences</h3>
                            <div class="mb-8">
                                <label for="recent-photos" class="block text-gray-600 font-medium text-sm md:text-lg mb-2">Foto Terbaru Anda / Recent Photos</label>
                                <input type="file" id="recent-photos" name="recent_photos" class="w-full text-gray-600 file:ml-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100" value="{{ old('recent_photos') }}">
                            </div>
                            <div class="mb-8">
                                <label for="partner-preferences" class="block text-gray-600 font-medium text-sm md:text-lg mb-2">Urutkan kriteria pasangan hidup ideal Anda / Sort your preferences for ideal life partner</label>

                                {{-- Daftar yang bisa di-drag-and-drop --}}
                                <div id="sortable-list" class="space-y-3">

                                    {{-- Item 1 --}}
                                    <div data-value="work" class="flex items-center bg-white p-3 rounded-lg shadow-sm border cursor-move">
                                        <span class="bg-[#3b5440] text-white rounded-full w-6 h-6 flex items-center justify-center font-bold text-sm mr-4 rank-badge">1</span>
                                        <span class="flex-grow text-gray-700 font-medium">Pekerjaan / Work</span>
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                                        </svg>
                                    </div>

                                    {{-- Item 2 --}}
                                    <div data-value="appearance" class="flex items-center bg-white p-3 rounded-lg shadow-sm border cursor-move">
                                        <span class="bg-[#3b5440] text-white rounded-full w-6 h-6 flex items-center justify-center font-bold text-sm mr-4 rank-badge">2</span>
                                        <span class="flex-grow text-gray-700 font-medium">Penampilan / Appearance</span>
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                                        </svg>
                                    </div>

                                    {{-- Item 3 --}}
                                    <div data-value="education" class="flex items-center bg-white p-3 rounded-lg shadow-sm border cursor-move">
                                        <span class="bg-[#3b5440] text-white rounded-full w-6 h-6 flex items-center justify-center font-bold text-sm mr-4 rank-badge">3</span>
                                        <span class="flex-grow text-gray-700 font-medium">Pendidikan / Education</span>
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                                        </svg>
                                    </div>

                                    {{-- Item 4 --}}
                                    <div data-value="salary" class="flex items-center bg-white p-3 rounded-lg shadow-sm border cursor-move">
                                        <span class="bg-[#3b5440] text-white rounded-full w-6 h-6 flex items-center justify-center font-bold text-sm mr-4 rank-badge">4</span>
                                        <span class="flex-grow text-gray-700 font-medium">Pendapatan / Salary</span>
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                                        </svg>
                                    </div>

                                </div>

                                {{-- Input tersembunyi untuk menyimpan urutan --}}
                                <input type="hidden" id="partner-preferences" name="partner_preferences" value="work,appearance,education,salary">

                                @error('partner_preferences') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-8">
                                <label for="social-media" class="block text-gray-600 font-medium text-sm md:text-lg mb-2">Instagram Account / Social Media Account</label>
                                <input type="text" id="social-media" name="social_media" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('social_media') }}">
                            </div>
                            <div class="mb-8">
                                <label for="about-self" class="block text-gray-600 font-medium text-sm md:text-lg mb-2">Describe Your Information (Personality, Hobbies, Strength)</label>
                                <textarea id="about-self" name="about_self" rows="4" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-red-500">{{ old('about_self') }}</textarea>
                            </div>
                            <div class="mb-8">
                                <label for="about-partner" class="block text-gray-600 font-medium text-sm md:text-lg mb-2">What I am looking for the partner (Personality, Hobbies, Strength)</label>
                                <textarea id="about-partner" name="about_partner" rows="4" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-red-500">{{ old('about_partner') }}</textarea>
                            </div>
                            <div class="mb-8">
                                <label for="referrer" class="block text-gray-600 font-medium text-sm md:text-lg mb-2">Referrer</label>
                                <input type="text" id="referrer" name="referrer" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-red-500" value="{{ old('referrer') }}">
                            </div>
                            <button type="submit">
                                <div class="bg-[#1c3f31] text-white px-6 py-3 rounded-lg hover:bg-red-600 transition w-full text-center font-semibold">
                                    Submit
                                </div>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

<script>
    const sortableList = document.getElementById('sortable-list');
    const hiddenInput = document.getElementById('partner-preferences');

    new Sortable(sortableList, {
        animation: 150,
        ghostClass: 'bg-green-100',


        onUpdate: function() {

            const badges = sortableList.querySelectorAll('.rank-badge');
            badges.forEach((badge, index) => {
                badge.textContent = index + 1;
            });


            const order = Array.from(sortableList.children)
                .map(item => item.dataset.value)
                .join(',');


            hiddenInput.value = order;
            console.log('New order:', hiddenInput.value);
        }
    });
</script>
@endpush

@endsection