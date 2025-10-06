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
                    <br>
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
                        <br>
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