@extends('layouts.app')

@section('content')
<section class="py-8 sm:py-16 px-4 sm:px-6">

    <h2 class="text-2xl sm:text-4xl font-bold text-mutedgold text-center mb-10 sm:mb-20">MEMBERSHIP</h2>

    <div class="mb-10 sm:mb-15">
        <h3 class="text-sm sm:text-lg font-bold text-forestgreen text-center mb-4">Non-Subscription</h3>

        <div class="flex border-1 border-forestgreen rounded-2xl sm:rounded-3xl overflow-hidden max-w-2xl mx-auto mb-6">
            <div class="flex flex-col justify-center items-start bg-white p-3 sm:p-8 w-2/5">
                <p class="text-sm sm:text-2xl font-bold text-forestgreen mb-1 sm:mb-2">STARTER</p>
                <p class="text-2xl sm:text-6xl font-bold text-mutedgold">998K</p>
            </div>
            <div class="flex flex-col justify-center bg-forestgreen rounded-l-2xl sm:rounded-l-3xl text-white p-2 sm:p-4 w-3/5 relative">
                <a href="#"
                    class="absolute top-2 right-2 sm:top-8 sm:right-8 bg-purewhite text-deepgreen font-bold px-3 py-1.5 sm:px-8 sm:py-3 rounded-xl sm:rounded-2xl text-xs sm:text-base text-center transition-colors whitespace-nowrap">
                    JOIN NOW
                </a>
                <div class="mt-8 sm:mt-6">
                    <p class="text-xs sm:text-lg font-semibold mb-2 sm:mb-3">Benefit:</p>
                    <ul class="list-disc list-inside text-xs sm:text-base font-semibold ml-2 sm:ml-4">
                        <li>1 match</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-10 sm:mb-15">
        <h3 class="text-sm sm:text-lg font-bold text-forestgreen text-center mb-4">Annual Subscription</h3>

        <div class="flex border-1 border-forestgreen rounded-2xl sm:rounded-3xl overflow-hidden max-w-2xl mx-auto mb-6 sm:mb-15">
            <div class="flex flex-col justify-center items-start bg-white p-3 sm:p-8 w-2/5">
                <p class="text-sm sm:text-2xl font-bold text-forestgreen mb-1 sm:mb-2">BASIC</p>
                <p class="text-2xl sm:text-6xl font-bold text-mutedgold">6MN</p>
            </div>
            <div class="flex flex-col justify-center bg-forestgreen rounded-l-2xl sm:rounded-l-3xl text-white p-2 sm:p-4 w-3/5 relative">
                <a href="#"
                    class="absolute top-2 right-2 sm:top-8 sm:right-8 bg-purewhite text-deepgreen font-bold px-3 py-1.5 sm:px-8 sm:py-3 rounded-xl sm:rounded-2xl text-xs sm:text-base text-center transition-colors whitespace-nowrap">
                    JOIN NOW
                </a>
                <div class="mt-8 sm:mt-6">
                    <p class="text-xs sm:text-lg font-semibold mb-2 sm:mb-3">Benefit:</p>
                    <ul class="list-disc list-inside text-xs sm:text-base font-semibold ml-2 sm:ml-4">
                        <li>4 match</li>
                        <li>2 group meetings</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="flex border-1 border-forestgreen rounded-2xl sm:rounded-3xl overflow-hidden max-w-2xl mx-auto mb-6">
            <div class="flex flex-col justify-center items-start bg-white p-3 sm:p-8 w-2/5">
                <p class="text-sm sm:text-2xl font-bold text-forestgreen mb-1 sm:mb-2">PREMIUM</p>
                <p class="text-2xl sm:text-6xl font-bold text-mutedgold">20MN</p>
            </div>
            <div class="flex flex-col justify-center bg-forestgreen rounded-l-2xl sm:rounded-l-3xl text-white p-2 sm:p-4 w-3/5 relative">
                <a href="#"
                    class="absolute top-2 right-2 sm:top-8 sm:right-8 bg-purewhite text-deepgreen font-bold px-3 py-1.5 sm:px-8 sm:py-3 rounded-xl sm:rounded-2xl text-xs sm:text-base text-center transition-colors whitespace-nowrap">
                    JOIN NOW
                </a>
                <div class="mt-8 sm:mt-6">
                    <p class="text-xs sm:text-lg font-semibold mb-2 sm:mb-3">Benefit:</p>
                    <ul class="list-disc list-inside text-xs sm:text-base font-semibold ml-2 sm:ml-4">
                        <li>5 match</li>
                        <li>3 group meetings</li>
                        <li>1 styling</li>
                    </ul>
                </div>
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