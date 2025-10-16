@extends('layouts.app')

@section('content')

<section class="py-8 sm:py-16 px-4 sm:px-6">

    <main class="flex-1 p-4 md:p-8">
        <div class="max-w-2xl mx-auto">

            <div x-data="{ currentStep: 0, totalSteps: 12, formData: {} }">

                {{-- 1. TAMPILAN PEMBUKA (HANYA TAMPIL SAAT currentStep === 0) --}}
                <div x-show="currentStep === 0" class="text-center bg-white pb-20 pt-15">
                    <h2 class="text-lg md:text-3xl font-bold text-[#1c3f31] mb-2">Thank you</h2>
                    <p class="text-sm md:text-xl text-[#1c3f31] mb-8">Clover Couple Manager will connect with you soon</p>
                    <button type-button @click="currentStep = 1"
                        class="w-full bg-[#2e5e4e] hover:bg-[#1c3f31] text-white py-3 rounded-xl hover:bg-opacity-90 transition text-sm md:text-lg lg:text-xl">
                        Continue Will I Ever Meet My Ideal Type Quiz →
                    </button>
                </div>

                {{-- 2. KESELURUHAN KUESIONER (HANYA TAMPIL SAAT currentStep > 0) --}}
                <div x-show="currentStep > 0">
                    {{-- Progress Bar --}}
                    <div class="mb-0">
                        <div class="flex justify-between items-center mb-0">
                            <span class="text-sm font-medium text-gray-600" x-text="'Step ' + currentStep + ' of ' + totalSteps"></span>
                            <span class="text-sm font-medium text-gray-800" x-text="Math.round((currentStep / totalSteps) * 100) + '%'"></span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-[#1c3f31] h-2.5 rounded-full transition-all duration-500" :style="'width: ' + (currentStep / totalSteps) * 100 + '%'"></div>
                        </div>
                    </div>

                    <div class="bg-white mt-10 p-8">
                        <form method="POST" action="{{ route('questionnaire.update') }}" enctype="multipart/form-data" @submit.prevent="if (currentStep === totalSteps) $el.submit()">
                            @csrf
                            @method('PATCH')

                            <div>
                                {{-- Step 1: Tinggi --}}
                                <div x-show="currentStep === 1">

                                    <div class="mb-4">
                                        <label for="height" class="flex justify-center text-gray-600 font-medium text-xl mb-4">Your Height</label>
                                        <input type="number" id="height" name="height" class="w-full border border-gray-300 rounded-lg p-3" value="{{ old('height', $questionnaire->height) }}" placeholder="cm">

                                    </div>

                                    <div>
                                        <label for="partner_height" class="flex justify-center text-gray-600 font-medium text-xl mb-4">Preference Partner Height</label>
                                        <input type="number" id="partner_height" name="partner_height" class="w-full border border-gray-300 rounded-lg p-3" value="{{ old('partner_height', $questionnaire->partner_height) }}" placeholder="cm">

                                    </div>

                                </div>

                                {{-- Step 2: Agama --}}
                                <div x-show="currentStep === 2">
                                    <div class="mb-4">
                                        <label for="religion" class="flex justify-center text-gray-600 font-medium text-xl mb-4">Your Religion</label>
                                        {{-- Perbaikan: name, id, dan value --}}
                                        <select id="religion" name="religion" class="w-full border border-gray-300 rounded-lg p-3">
                                            <option value="">Choose your religion</option>
                                            <option value="islam" {{ old('religion', $questionnaire->religion) == 'islam' ? 'selected' : '' }}>Islam</option>
                                            <option value="kristen" {{ old('religion', $questionnaire->religion) == 'kristen' ? 'selected' : '' }}>Kristen</option>
                                            <option value="katolik" {{ old('religion', $questionnaire->religion) == 'katolik' ? 'selected' : '' }}>Katolik</option>
                                            <option value="hindu" {{ old('religion', $questionnaire->religion) == 'hindu' ? 'selected' : '' }}>Hindu</option>
                                            <option value="buddha" {{ old('religion', $questionnaire->religion) == 'buddha' ? 'selected' : '' }}>Buddha</option>
                                            <option value="konghucu" {{ old('religion', $questionnaire->religion) == 'konghucu' ? 'selected' : '' }}>Konghucu</option>
                                            <option value="lainnya" {{ old('religion', $questionnaire->religion) == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                                        </select>

                                    </div>

                                    <div>
                                        <label for="partner_religion" class="flex justify-center text-gray-600 font-medium text-xl mb-4">Preference Partner Religion</label>
                                        {{-- Perbaikan: name, id, dan value --}}
                                        <select id="partner_religion" name="partner_religion" class="w-full border border-gray-300 rounded-lg p-3">
                                            <option value="">Choose partner's religion</option>
                                            <option value="islam" {{ old('partner_religion', $questionnaire->partner_religion) == 'islam' ? 'selected' : '' }}>Islam</option>
                                            <option value="kristen" {{ old('partner_religion', $questionnaire->partner_religion) == 'kristen' ? 'selected' : '' }}>Kristen</option>
                                            <option value="katolik" {{ old('partner_religion', $questionnaire->partner_religion) == 'katolik' ? 'selected' : '' }}>Katolik</option>
                                            <option value="hindu" {{ old('partner_religion', $questionnaire->partner_religion) == 'hindu' ? 'selected' : '' }}>Hindu</option>
                                            <option value="buddha" {{ old('partner_religion', $questionnaire->partner_religion) == 'buddha' ? 'selected' : '' }}>Buddha</option>
                                            <option value="konghucu" {{ old('partner_religion', $questionnaire->partner_religion) == 'konghucu' ? 'selected' : '' }}>Konghucu</option>
                                            <option value="lainnya" {{ old('partner_religion', $questionnaire->partner_religion) == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                                        </select>

                                    </div>
                                </div>

                                {{-- Step 3: Suku / Ethnicity --}}
                                <div x-show="currentStep === 3">
                                    <div class="mb-4">
                                        <label for="ethnicity" class="flex justify-center text-gray-600 font-medium text-xl mb-4">Your Ethnicity</label>
                                        <select id="ethnicity" name="ethnicity" class="w-full border border-gray-300 rounded-lg p-3">
                                            <option value="">Choose your ethnicity</option>
                                            <option value="jawa" {{ old('ethnicity', $questionnaire->ethnicity) == 'jawa' ? 'selected' : '' }}>Jawa</option>
                                            <option value="sunda" {{ old('ethnicity', $questionnaire->ethnicity) == 'sunda' ? 'selected' : '' }}>Sunda</option>
                                            <option value="batak" {{ old('ethnicity', $questionnaire->ethnicity) == 'batak' ? 'selected' : '' }}>Batak</option>
                                            <option value="tionghoa" {{ old('ethnicity', $questionnaire->ethnicity) == 'tionghoa' ? 'selected' : '' }}>Tionghoa</option>
                                            <option value="melayu" {{ old('ethnicity', $questionnaire->ethnicity) == 'melayu' ? 'selected' : '' }}>Melayu</option>
                                            <option value="lainnya" {{ old('ethnicity', $questionnaire->ethnicity) == 'lainnya' ? 'selected' : '' }}>Lainnya / Other</option>
                                        </select>

                                    </div>

                                    <div>
                                        <label for="partner_ethnicity" class="flex justify-center text-gray-600 font-medium text-xl mb-4">Preference Partner Ethnicity</label>
                                        <select id="partner_ethnicity" name="partner_ethnicity" class="w-full border border-gray-300 rounded-lg p-3">
                                            <option value="">Choose partner's ethnicity</option>
                                            <option value="jawa" {{ old('partner_ethnicity', $questionnaire->partner_ethnicity) == 'jawa' ? 'selected' : '' }}>Jawa</option>
                                            <option value="sunda" {{ old('partner_ethnicity', $questionnaire->partner_ethnicity) == 'sunda' ? 'selected' : '' }}>Sunda</option>
                                            <option value="batak" {{ old('partner_ethnicity', $questionnaire->partner_ethnicity) == 'batak' ? 'selected' : '' }}>Batak</option>
                                            <option value="tionghoa" {{ old('partner_ethnicity', $questionnaire->partner_ethnicity) == 'tionghoa' ? 'selected' : '' }}>Tionghoa</option>
                                            <option value="melayu" {{ old('partner_ethnicity', $questionnaire->partner_ethnicity) == 'melayu' ? 'selected' : '' }}>Melayu</option>
                                            <option value="terbuka" {{ old('partner_ethnicity', $questionnaire->partner_ethnicity) == 'terbuka' ? 'selected' : '' }}>Terbuka / Open to any</option>
                                            <option value="lainnya" {{ old('partner_ethnicity', $questionnaire->partner_ethnicity) == 'lainnya' ? 'selected' : '' }}>Lainnya / Other</option>
                                        </select>

                                    </div>
                                </div>

                                {{-- Step 4: Status Perkawinan / Marital History --}}
                                <div x-show="currentStep === 4">
                                    <div class="mb-4">
                                        <label for="marital_status" class="flex justify-center text-gray-600 font-medium text-xl mb-4">Your Marital History</label>
                                        <select id="marital_status" name="marital_status" class="w-full border border-gray-300 rounded-lg p-3">
                                            <option value="">Choose your marital status</option>
                                            <option value="single" {{ old('marital_status', $questionnaire->marital_status) == 'single' ? 'selected' : '' }}>Single</option>
                                            <option value="married" {{ old('marital_status', $questionnaire->marital_status) == 'married' ? 'selected' : '' }}>Married</option>
                                            <option value="divorced" {{ old('marital_status', $questionnaire->marital_status) == 'divorced' ? 'selected' : '' }}>Divorced</option>
                                            <option value="widowed" {{ old('marital_status', $questionnaire->marital_status) == 'widowed' ? 'selected' : '' }}>Widowed</option>
                                        </select>

                                    </div>

                                    <div>
                                        <label for="partner_marital_status" class="flex justify-center text-gray-600 font-medium text-xl mb-4">Preference Partner Marital History</label>
                                        <select id="partner_marital_status" name="partner_marital_status" class="w-full border border-gray-300 rounded-lg p-3">
                                            <option value="">Choose partner's marital status</option>
                                            <option value="single" {{ old('partner_marital_status', $questionnaire->partner_marital_status) == 'single' ? 'selected' : '' }}>Single</option>
                                            <option value="married" {{ old('partner_marital_status', $questionnaire->partner_marital_status) == 'married' ? 'selected' : '' }}>Married</option>
                                            <option value="divorced" {{ old('partner_marital_status', $questionnaire->partner_marital_status) == 'divorced' ? 'selected' : '' }}>Divorced</option>
                                            <option value="widowed" {{ old('partner_marital_status', $questionnaire->partner_marital_status) == 'widowed' ? 'selected' : '' }}>Widowed</option>
                                            <option value="open" {{ old('partner_marital_status', $questionnaire->partner_marital_status) == 'open' ? 'selected' : '' }}>Open to any</option>
                                        </select>

                                    </div>
                                </div>

                                {{-- Step 5: Pendidikan Terakhir / Last School --}}
                                <div x-show="currentStep === 5">
                                    <div class="mb-4">
                                        <label for="education" class="flex justify-center text-gray-600 font-medium text-xl mb-4">Your Last Education</label>
                                        <select id="education" name="education" class="w-full border border-gray-300 rounded-lg p-3">
                                            <option value="">Choose your last education</option>
                                            <option value="high_school" {{ old('education', $questionnaire->education) == 'high_school' ? 'selected' : '' }}>High School</option>
                                            <option value="bachelor_degree" {{ old('education', $questionnaire->education) == 'bachelor_degree' ? 'selected' : '' }}>Bachelor Degree</option>
                                            <option value="master" {{ old('education', $questionnaire->education) == 'master' ? 'selected' : '' }}>Master</option>
                                            <option value="phd" {{ old('education', $questionnaire->education) == 'phd' ? 'selected' : '' }}>PhD</option>
                                            <option value="etc" {{ old('education', $questionnaire->education) == 'etc' ? 'selected' : '' }}>Etc</option>
                                        </select>

                                    </div>

                                    <div>
                                        <label for="partner_education" class="flex justify-center text-gray-600 font-medium text-xl mb-4">Preference Partner Last Education</label>
                                        <select id="partner_education" name="partner_education" class="w-full border border-gray-300 rounded-lg p-3">
                                            <option value="">Choose partner's last education</option>
                                            <option value="high_school" {{ old('partner_education', $questionnaire->partner_education) == 'high_school' ? 'selected' : '' }}>High School</option>
                                            <option value="bachelor_degree" {{ old('partner_education', $questionnaire->partner_education) == 'bachelor_degree' ? 'selected' : '' }}>Bachelor Degree</option>
                                            <option value="master" {{ old('partner_education', $questionnaire->partner_education) == 'master' ? 'selected' : '' }}>Master</option>
                                            <option value="phd" {{ old('partner_education', $questionnaire->partner_education) == 'phd' ? 'selected' : '' }}>PhD</option>
                                            <option value="etc" {{ old('partner_education', $questionnaire->partner_education) == 'etc' ? 'selected' : '' }}>Etc</option>
                                            <option value="open" {{ old('partner_education', $questionnaire->partner_education) == 'open' ? 'selected' : '' }}>Open to any</option>
                                        </select>

                                    </div>
                                </div>

                                {{-- Step 6: Pekerjaan / Occupation --}}
                                <div x-show="currentStep === 6">
                                    <div class="mb-4">
                                        <label for="occupation" class="flex justify-center text-gray-600 font-medium text-xl mb-4">Your Occupation</label>
                                        <select id="occupation" name="occupation" class="w-full border border-gray-300 rounded-lg p-3">
                                            <option value="">Choose your occupation</option>
                                            <option value="employee" {{ old('occupation', $questionnaire->occupation) == 'employee' ? 'selected' : '' }}>Employee</option>
                                            <option value="entrepreneur" {{ old('occupation', $questionnaire->occupation) == 'entrepreneur' ? 'selected' : '' }}>Entrepreneur</option>
                                            <option value="freelancer" {{ old('occupation', $questionnaire->occupation) == 'freelancer' ? 'selected' : '' }}>Freelancer</option>
                                            <option value="unemployed" {{ old('occupation', $questionnaire->occupation) == 'unemployed' ? 'selected' : '' }}>Unemployed</option>
                                            <option value="others" {{ old('occupation', $questionnaire->occupation) == 'others' ? 'selected' : '' }}>Others</option>
                                        </select>

                                    </div>

                                    <div>
                                        <label for="partner_occupation" class="flex justify-center text-gray-600 font-medium text-xl mb-4">Preference Partner Occupation</label>
                                        <select id="partner_occupation" name="partner_occupation" class="w-full border border-gray-300 rounded-lg p-3">
                                            <option value="">Choose partner's occupation</option>
                                            <option value="employee" {{ old('partner_occupation', $questionnaire->partner_occupation) == 'employee' ? 'selected' : '' }}>Employee</option>
                                            <option value="entrepreneur" {{ old('partner_occupation', $questionnaire->partner_occupation) == 'entrepreneur' ? 'selected' : '' }}>Entrepreneur</option>
                                            <option value="freelancer" {{ old('partner_occupation', $questionnaire->partner_occupation) == 'freelancer' ? 'selected' : '' }}>Freelancer</option>
                                            <option value="unemployed" {{ old('partner_occupation', $questionnaire->partner_occupation) == 'unemployed' ? 'selected' : '' }}>Unemployed</option>
                                            <option value="others" {{ old('partner_occupation', $questionnaire->partner_occupation) == 'others' ? 'selected' : '' }}>Others</option>
                                            <option value="open" {{ old('partner_occupation', $questionnaire->partner_occupation) == 'open' ? 'selected' : '' }}>Open to any</option>
                                        </select>

                                    </div>
                                </div>

                                {{-- Step 7: Pendapatan Bulanan / Monthly Income --}}
                                <div x-show="currentStep === 7">
                                    <div class="mb-4">
                                        <label for="income" class="flex justify-center text-gray-600 font-medium text-xl mb-4">Your Monthly Income</label>
                                        <select id="income" name="income" class="w-full border border-gray-300 rounded-lg p-3">
                                            <option value="">Choose your income range</option>
                                            <option value="0-10" {{ old('income', $questionnaire->income) == '0-10' ? 'selected' : '' }}>IDR 0 - 10 million</option>
                                            <option value="11-70" {{ old('income', $questionnaire->income) == '11-70' ? 'selected' : '' }}>IDR 11 - 70 million</option>
                                            <option value=">70" {{ old('income', $questionnaire->income) == '>70' ? 'selected' : '' }}>IDR > 70 million</option>
                                            <option value="others" {{ old('income', $questionnaire->income) == 'others' ? 'selected' : '' }}>Others</option>
                                        </select>

                                    </div>

                                    <div>
                                        <label for="partner_income" class="flex justify-center text-gray-600 font-medium text-xl mb-4">Preference Partner Monthly Income</label>
                                        <select id="partner_income" name="partner_income" class="w-full border border-gray-300 rounded-lg p-3">
                                            <option value="">Choose partner's income range</option>
                                            <option value="0-10" {{ old('partner_income', $questionnaire->partner_income) == '0-10' ? 'selected' : '' }}>IDR 0 - 10 million</option>
                                            <option value="11-70" {{ old('partner_income', $questionnaire->partner_income) == '11-70' ? 'selected' : '' }}>IDR 11 - 70 million</option>
                                            <option value=">70" {{ old('partner_income', $questionnaire->partner_income) == '>70' ? 'selected' : '' }}>IDR > 70 million</option>
                                            <option value="others" {{ old('partner_income', $questionnaire->partner_income) == 'others' ? 'selected' : '' }}>Others</option>
                                            <option value="open" {{ old('partner_income', $questionnaire->partner_income) == 'open' ? 'selected' : '' }}>Doesn't Matter</option>
                                        </select>

                                    </div>
                                </div>

                                {{-- Step 8: Kepribadian / Personality --}}
                                <div x-show="currentStep === 8">
                                    <div class="mb-4">
                                        <label for="personality" class="flex justify-center text-gray-600 font-medium text-xl mb-4">Your Personality</label>
                                        <select id="personality" name="personality" class="w-full border border-gray-300 rounded-lg p-3">
                                            <option value="">Choose your personality</option>
                                            <option value="calm_serious" {{ old('personality', $questionnaire->personality) == 'calm_serious' ? 'selected' : '' }}>Calm & serious</option>
                                            <option value="warm_kind" {{ old('personality', $questionnaire->personality) == 'warm_kind' ? 'selected' : '' }}>Warm & kind</option>
                                            <option value="humorous_lively" {{ old('personality', $questionnaire->personality) == 'humorous_lively' ? 'selected' : '' }}>Humorous & lively</option>
                                            <option value="intelligent_sharp" {{ old('personality', $questionnaire->personality) == 'intelligent_sharp' ? 'selected' : '' }}>Intelligent & sharp</option>
                                        </select>

                                    </div>

                                    <div>
                                        <label for="partner_personality" class="flex justify-center text-gray-600 font-medium text-xl mb-4">Preference Partner Personality</label>
                                        <select id="partner_personality" name="partner_personality" class="w-full border border-gray-300 rounded-lg p-3">
                                            <option value="">Choose partner's personality</option>
                                            <option value="calm_serious" {{ old('partner_personality', $questionnaire->partner_personality) == 'calm_serious' ? 'selected' : '' }}>Calm & serious</option>
                                            <option value="warm_kind" {{ old('partner_personality', $questionnaire->partner_personality) == 'warm_kind' ? 'selected' : '' }}>Warm & kind</option>
                                            <option value="humorous_lively" {{ old('partner_personality', $questionnaire->partner_personality) == 'humorous_lively' ? 'selected' : '' }}>Humorous & lively</option>
                                            <option value="intelligent_sharp" {{ old('partner_personality', $questionnaire->partner_personality) == 'intelligent_sharp' ? 'selected' : '' }}>Intelligent & sharp</option>
                                            <option value="open" {{ old('partner_personality', $questionnaire->partner_personality) == 'open' ? 'selected' : '' }}>Open to any</option>
                                        </select>

                                    </div>
                                </div>

                                {{-- Step 9: Detail Informasi --}}
                                <div x-show="currentStep === 9" class="space-y-6">

                                    {{-- Last School --}}
                                    <div>
                                        <label for="last_school" class="flex justify-center text-gray-600 font-medium text-xl mb-4">Last School</label>
                                        <input type="text" id="last_school" name="last_school" class="w-full border border-gray-300 rounded-lg p-3" value="{{ old('last_school', $questionnaire->last_school) }}" placeholder="e.g., Universitas Indonesia">

                                    </div>

                                    {{-- Company --}}
                                    <div>
                                        <label for="company" class="flex justify-center text-gray-600 font-medium text-xl mb-4">Company</label>
                                        <input type="text" id="company" name="company" class="w-full border border-gray-300 rounded-lg p-3" value="{{ old('company', $questionnaire->company) }}" placeholder="e.g., Google Indonesia">

                                    </div>

                                    {{-- Job Position --}}
                                    <div>
                                        <label for="job_position" class="flex justify-center text-gray-600 font-medium text-xl mb-4">Job Position</label>
                                        <input type="text" id="job_position" name="job_position" class="w-full border border-gray-300 rounded-lg p-3" value="{{ old('job_position', $questionnaire->job_position) }}" placeholder="e.g., Software Engineer">

                                    </div>

                                    {{-- Social Media --}}
                                    <div>
                                        <label for="social_media" class="flex justify-center text-gray-600 font-medium text-xl mb-4">Social Media</label>
                                        <input type="text" id="social_media" name="social_media" class="w-full border border-gray-300 rounded-lg p-3" value="{{ old('social_media', $questionnaire->social_media) }}" placeholder="e.g., Instagram: @username">

                                    </div>

                                </div>

                                {{-- Step 10: Deskripsi / Description --}}
                                <div x-show="currentStep === 10" class="space-y-6">

                                    {{-- Your Description --}}
                                    <div>
                                        <label for="description" class="flex justify-center text-gray-600 font-medium text-xl mb-4">Describe Yourself</label>
                                        <p class="text-center text-sm text-gray-500 mb-2">Personality, Hobbies, Strength, etc.</p>
                                        <textarea id="description" name="description" rows="5" class="w-full border border-gray-300 rounded-lg p-3" placeholder="Tell us a little about yourself...">{{ old('description', $questionnaire->description) }}</textarea>

                                    </div>

                                    {{-- Partner Description --}}
                                    <div>
                                        <label for="partner_description" class="flex justify-center text-gray-600 font-medium text-xl mb-4">Describe Your Ideal Partner</label>
                                        <p class="text-center text-sm text-gray-500 mb-2">Personality, Hobbies, Strength, etc.</p>
                                        <textarea id="partner_description" name="partner_description" rows="5" class="w-full border border-gray-300 rounded-lg p-3" placeholder="What are you looking for in a partner?">{{ old('partner_description', $questionnaire->partner_description) }}</textarea>

                                    </div>

                                </div>

                                {{-- Step 11: Partner Priority --}}
                                <div x-show="currentStep === 11">
                                    <div class="mb-4">
                                        <label for="partner_priority" class="flex justify-center text-gray-600 font-medium text-xl mb-4">Sort Your Ideal Partner Priority</label>
                                        <p class="text-center text-sm text-gray-500 mb-3">Drag and drop to rank. Number 1 is your highest priority.</p>

                                        {{-- Daftar yang bisa di-drag-and-drop --}}
                                        <div id="sortable-priority-list" class="space-y-3">

                                            {{-- Item --}}

                                            @foreach ($sortedPriorities as $key => $label)
                                            <div data-value="{{ $key }}" class="flex items-center bg-white p-3 rounded-lg shadow-sm border cursor-move">
                                                <span class="bg-[#3b5440] text-white rounded-full w-6 h-6 flex items-center justify-center font-bold text-sm mr-4 rank-badge">{{ $loop->iteration }}</span>
                                                <span class="flex-grow text-gray-700 font-medium">{{ $label }}</span>
                                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                                                </svg>
                                            </div>
                                            @endforeach

                                        </div>

                                        {{-- Input tersembunyi untuk menyimpan urutan --}}
                                        <input type="hidden" id="partner_priority" name="partner_priority" value="{{ old('partner_priority', $questionnaire->partner_priority) }}">

                                    </div>
                                </div>

                                {{-- Step 12: Uploads & Referral --}}
                                <div x-show="currentStep === 12" class="space-y-6">

                                    {{-- Profile Picture --}}
                                    <div>
                                        <label for="profile_picture" class="flex justify-center text-gray-600 font-medium text-xl mb-4">Your Profile Picture</label>
                                        <p class="text-center text-sm text-gray-500 mb-2">Upload your recent clear photo. Max 2MB.</p>
                                        <input type="file" id="profile_picture" name="profile_picture" class="w-full text-gray-600 file:ml-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#1c3f31] file:text-white hover:file:bg-white hover:file:text-[#1c3f31]">

                                    </div>

                                    {{-- Business Card --}}
                                    <div>
                                        <label for="business_card" class="flex justify-center text-gray-600 font-medium text-xl mb-4">Business Card</label>
                                        <p class="text-center text-sm text-gray-500 mb-2">Upload your business card (optional). Max 2MB.</p>
                                        <input type="file" id="business_card" name="business_card" class="w-full text-gray-600 file:ml-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#1c3f31] file:text-white hover:file:bg-white hover:file:text-[#1c3f31]">

                                    </div>

                                    {{-- Referral Code --}}
                                    <div>
                                        <label for="referral_code" class="flex justify-center text-gray-600 font-medium text-xl mb-4">Referral Code</label>
                                        <p class="text-center text-sm text-gray-500 mb-2">If you have a referral code, enter it here.</p>
                                        <input type="text" id="referral_code" name="referral_code" class="w-full border border-gray-300 rounded-lg p-3" value="{{ old('referral_code',$questionnaire->referral_code) }}" placeholder="e.g., CLVR123">

                                    </div>

                                </div>

                            </div>

                            {{-- Tombol Navigasi --}}
                            <div class="mt-10 flex justify-between">
                                <button type="button" x-show="currentStep > 1" @click="currentStep--" class="bg-gray-200 text-gray-700 font-semibold py-2 px-6 rounded-lg hover:bg-gray-300 transition">Back</button>
                                <div x-show="currentStep === 1"></div>
                                <button type="button" x-show="currentStep < totalSteps" @click="currentStep++" class="bg-[#1c3f31] text-white font-semibold py-2 px-6 rounded-lg hover:bg-opacity-90 transition">Next</button>
                                <button type="submit" x-show="currentStep === totalSteps" class="bg-green-600 text-white font-semibold py-2 px-6 rounded-lg hover:bg-green-700 transition">Submit Questionnaire</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </main>

</section>

<section class="bg-forestgreen py-12 px-6v mt-12">
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

@push('scripts')

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

<script>
    const priorityList = document.getElementById('sortable-priority-list');
    if (priorityList) {
        const hiddenInput = document.getElementById('partner_priority');

        new Sortable(priorityList, {
            animation: 150,
            ghostClass: 'bg-green-100',

            onUpdate: function() {
                // Update nomor urutan
                const badges = priorityList.querySelectorAll('.rank-badge');
                badges.forEach((badge, index) => {
                    badge.textContent = index + 1;
                });

                // Simpan urutan baru ke input tersembunyi
                const order = Array.from(priorityList.children)
                    .map(item => item.dataset.value)
                    .join(',');
                hiddenInput.value = order;
            }
        });
    }
</script>

@endpush

@endsection