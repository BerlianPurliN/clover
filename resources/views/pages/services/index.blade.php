@extends('layouts.app')

@section('content')

<section class="py-8 sm:py-16 px-4 sm:px-6">
    <h2 class="text-3xl sm:text-4xl font-bold text-mutedgold text-center mb-10 sm:mb-20">SERVICES</h2>

    <div class="max-w-2xl mx-auto space-y-16 sm:space-y-20">

        <div class="flex items-center gap-4 sm:gap-6">
            <img src="https://images.unsplash.com/photo-1455390582262-044cdead277a"
                alt="Relationship Consultation"
                class="w-24 h-24 sm:w-32 sm:h-32 rounded-full object-cover shadow-lg flex-shrink-0">
            <div class="flex-1">
                <h3 class="text-xl sm:text-2xl font-semibold text-forestgreen mb-1">Relationship Consultation</h3>
                <p class="italic text-deepgreen text-sm sm:text-base mb-2">Struggling with finding the right one?</p>
                <p class="text-sm sm:text-base text-deepgreen leading-relaxed">
                    Share your story with our expert consultants. We'll guide you with personalized advice
                    to help you meet the partner who truly matches your values.
                </p>
            </div>
        </div>

        <div class="flex flex-row-reverse items-center gap-4 sm:gap-6">
            <img src="https://images.unsplash.com/photo-1516589178581-6cd7833ae3b2"
                alt="Matchmaking"
                class="w-24 h-24 sm:w-32 sm:h-32 rounded-full object-cover shadow-lg flex-shrink-0">
            <div class="flex-1 text-right">
                <h3 class="text-xl sm:text-2xl font-semibold text-forestgreen mb-1">Matchmaking</h3>
                <p class="italic text-deepgreen text-sm sm:text-base mb-2">Tired of endless swipes and waste of time?</p>
                <p class="text-sm sm:text-base text-deepgreen leading-relaxed">
                    Clover connects you with verified, compatible singles who are ready for real commitment.
                </p>
            </div>
        </div>

        <div class="flex items-center gap-4 sm:gap-6">
            <img src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622"
                alt="Event"
                class="w-24 h-24 sm:w-32 sm:h-32 rounded-full object-cover shadow-lg flex-shrink-0">
            <div class="flex-1">
                <h3 class="text-xl sm:text-2xl font-semibold text-forestgreen mb-1">Event</h3>
                <p class="italic text-deepgreen text-sm sm:text-base mb-2">Feeling stuck in the same circle?</p>
                <p class="text-sm sm:text-base text-deepgreen leading-relaxed">
                    Clover hosts curated gatherings with enriching activities
                    (e.g. personal color tests, sports, etc). Connect with verified people in a safe environment!
                </p>
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