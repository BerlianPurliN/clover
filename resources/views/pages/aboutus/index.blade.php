@extends('layouts.app')

@section('content')

<section class="py-8 sm:py-16 px-4 sm:px-6">
    <h2 class="text-3xl sm:text-4xl font-bold text-mutedgold text-center mb-5 sm:mb-8">ABOUT US</h2>
    <h3 class="text-3xl sm:text-4xl font-bold text-deepgreen text-center mb-5 sm:mb-8">How Clover works?</h3>

    <div class="max-w-xl mx-auto space-y-8 sm:space-y-10">

        <div class="flex items-center gap-4 border border-forestgreen rounded-2xl p-4 shadow-sm">
            <div class="items-center justify-center text-forestgreen font-normal text-4xl">
                1
            </div>
            <div>
                <img src="assets/img/register.png" class="h-12" />
            </div>
            <div class="flex-1 text-sm text-forestgreen">
                <p>
                    Register as member and complete your profile.
                    Dedicated Couple Manager will personally verify your information.
                </p>
            </div>
        </div>
        <div class="flex items-center gap-4 border border-forestgreen rounded-2xl p-4 shadow-sm">
            <div class="items-center justify-center text-forestgreen font-normal text-4xl">
                2
            </div>
            <div>
                <img src="assets/img/invitation.png" class="h-12" />
            </div>
            <div class="flex-1 text-sm text-forestgreen">
                <p>
                    Upon verification as a Clover member, you gain access to invitation-only events.
                    Your dedicated Couple Manager will refine your preferences and curate
                    high-quality, compatible introductions.
                </p>
            </div>
        </div>
        <div class="flex items-center gap-4 border border-forestgreen rounded-2xl p-4 shadow-sm">
            <div class="items-center justify-center text-forestgreen font-normal text-4xl">
                3
            </div>
            <div>
                <img src="assets/img/member.png" class="h-12" />
            </div>
            <div class="flex-1 text-sm text-forestgreen">
                <p>
                    Throughout your membership, Clover provides continuous guidance and curated
                    matching through dedicated Couple Manager. As a member, you’ll also enjoy access
                    to exclusive curated events to enrich yourself and expand your network.
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