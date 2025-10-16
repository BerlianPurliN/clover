@extends('layouts.app')

@section('content')

<section class="py-8 sm:py-16 px-4 sm:px-6">
    <h2 class="text-3xl sm:text-4xl font-bold text-mutedgold text-center mb-5 sm:mb-8">ABOUT US</h2>
    <h3 class="text-2xl sm:text-2xl font-bold text-deepgreen text-center mb-5 sm:mb-8 bg-[#e2c044] py-2 px-15 rounded-2xl w-max mx-auto">How Clover works?</h3>

    <div class="max-w-xl mx-auto space-y-8 sm:space-y-10">

        <div class="flex items-center gap-4 border border-forestgreen rounded-2xl p-4 shadow-sm">
            <div class="items-center justify-center text-forestgreen font-normal text-4xl">
                1
            </div>
            <div>
                <img src="assets/img/register.png" class="h-12" />
            </div>
            <div class="flex-1 text-sm font-bold text-forestgreen">
                <p>
                    Register and complete your profile.
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
            <div class="flex-1 text-sm font-bold text-forestgreen">
                <p>
                    To be verified as a Clover member, complete a few steps with guidance from your Couple Manager.
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
            <div class="flex-1 text-sm font-bold text-forestgreen">
                <p>
                    Clover provides ongoing support and curated matches through your Couple Manager, along with exclusive events to enrich your life and expand your network.
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
<a href="https://wa.me/6282311345189"
    target="_blank"
    rel="noopener noreferrer"
    aria-label="Chat on WhatsApp"
    class="fixed bottom-6 right-6 z-50 bg-[#25D366] text-white p-3 rounded-full shadow-lg hover:bg-green-600 transition-all transform hover:scale-110">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24" fill="currentColor">
        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.894 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.886-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01s-.521.074-.792.372c-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.626.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
    </svg>
</a>

@endsection