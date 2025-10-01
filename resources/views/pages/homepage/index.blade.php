@extends('layouts.app')

@section('content')

{{-- Hero Section --}}
<section class="relative min-h-[calc(100vh-96px)] flex items-center">
    <div class="lg:hidden w-full h-full flex">

        <div class="w-[45%] relative">
            <div id="hero-carousel-mobile" class="relative w-full h-full" data-carousel="slide">
                <div class="relative h-full overflow-hidden">
                    <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                        <img src="https://images.unsplash.com/photo-1519741497674-611481863552"
                            class="absolute block w-full h-full object-cover"
                            alt="Slide 1">
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent to-white/30"></div>
                    </div>
                    <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                        <img src="https://images.unsplash.com/photo-1606800052052-a08af7148866"
                            class="absolute block w-full h-full object-cover"
                            alt="Slide 2">
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent to-white/30"></div>
                    </div>
                    <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                        <img src="https://images.unsplash.com/photo-1583939003579-730e3918a45a"
                            class="absolute block w-full h-full object-cover"
                            alt="Slide 3">
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent to-white/30"></div>
                    </div>
                </div>

                <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex gap-1.5 z-30">
                    <button type="button" class="w-1.5 h-1.5 rounded-full bg-white" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button" class="w-1.5 h-1.5 rounded-full bg-white/50" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    <button type="button" class="w-1.5 h-1.5 rounded-full bg-white/50" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                </div>
            </div>
        </div>

        <div class="w-[55%] bg-white flex items-center justify-center px-4 py-8">
            <div class="text-right max-w-xs">
                <h1 class="text-2xl font-bold text-deepgreen leading-tight mb-3">
                    Discover Real Connection
                </h1>
                <p class="text-sm text-deepgreen mb-6">
                    Beyond Dating, We Build Meaningful Connection
                </p>
                <div class="flex flex-col gap-3">
                    <a href="#services"
                        class="bg-mutedgold text-deepgreen font-medium px-3 py-2 rounded-md text-center text-sm hover:bg-opacity-90 transition-all shadow-md">
                        Start Now
                    </a>
                    <a href="#contact"
                        class="bg-forestgreen text-purewhite font-medium text-start px-3 py-2 rounded-md inline-flex items-center justify-center gap-2 hover:bg-opacity-90 transition-all shadow-md">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z" />
                        </svg>
                        <span class="text-sm">Consult with Expert</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="hidden lg:block absolute inset-0 z-0">
        <div id="hero-carousel" class="relative w-full h-full" data-carousel="slide">
            <div class="relative h-full overflow-hidden">
                <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                    <img src="https://images.unsplash.com/photo-1519741497674-611481863552"
                        class="absolute block w-full h-full object-cover"
                        alt="Slide 1">
                    <div class="absolute inset-0 bg-white/40"></div>
                </div>
                <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                    <img src="https://images.unsplash.com/photo-1606800052052-a08af7148866"
                        class="absolute block w-full h-full object-cover"
                        alt="Slide 2">
                    <div class="absolute inset-0 bg-white/40"></div>
                </div>
                <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                    <img src="https://images.unsplash.com/photo-1583939003579-730e3918a45a"
                        class="absolute block w-full h-full object-cover"
                        alt="Slide 3">
                    <div class="absolute inset-0 bg-white/40"></div>
                </div>
            </div>

            <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex gap-2 z-30">
                <button type="button" class="w-2 h-2 rounded-full bg-forestgreen" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-2 h-2 rounded-full bg-forestgreen/50" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="w-2 h-2 rounded-full bg-forestgreen/50" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            </div>
        </div>
    </div>

    <div class="hidden lg:block relative z-10 max-w-4xl mx-auto text-center px-4">
        <h1 class="text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-bold text-deepgreen leading-tight mb-4 sm:mb-6">
            Discover Real Connection
        </h1>
        <p class="text-lg sm:text-xl lg:text-2xl text-deepgreen mb-8 sm:mb-10">
            Beyond Dating, We Build Meaningful Connection
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#services"
                class="bg-mutedgold text-deepgreen font-medium px-8 sm:px-10 py-4 sm:py-5 rounded-md text-center text-base sm:text-lg hover:bg-opacity-90 transition-all shadow-lg">
                Start Now
            </a>
            <a href="#contact"
                class="bg-forestgreen text-purewhite font-medium px-8 sm:px-10 py-4 sm:py-5 rounded-md inline-flex items-center justify-center gap-3 hover:bg-opacity-90 transition-all shadow-lg">
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z" />
                </svg>
                <span class="text-base sm:text-lg">Consult with Expert</span>
            </a>
        </div>
    </div>
</section>

<section class="py-16 text-center">
    <h2 class="text-4xl font-bold text-mutedgold mb-8 sm:mb-28">SERVICES</h2>
    <div class="flex flex-row justify-center gap-5 sm:gap-56">
        <div class="flex flex-col items-center">
            <img src="https://picsum.photos/200" class="rounded-full w-28 h-28 object-cover">
            <p class="mt-3 text-deepgreen font-medium">Relationship<br />Consultation</p>
        </div>
        <div class="flex flex-col items-center">
            <img src="https://picsum.photos/201" class="rounded-full w-28 h-28 object-cover">
            <p class="mt-3 text-deepgreen font-medium">Matchmaking</p>
        </div>
        <div class="flex flex-col items-center">
            <img src="https://picsum.photos/202" class="rounded-full w-28 h-28 object-cover">
            <p class="mt-3 text-deepgreen font-medium">Events</p>
        </div>
    </div>
</section>

<section class="bg-forestgreen py-16 px-6">
    <h2 class="text-2xl font-bold text-center text-white mb-10">WHY CLOVER</h2>
    <div class="max-w-3xl mx-auto bg-white rounded-sm shadow-lg p-6 relative">
        <div class="absolute left-[119px] top-9 bottom-18 md:bottom-15 sm:bottom-13 w-0.5 bg-deepgreen"></div>

        <ol class="space-y-10 relative">         
            <li class="grid grid-cols-[64px_32px_1fr] gap-4 items-start">
                <div class="flex justify-center">
                    <img src="assets/img/profile.png" class="h-12 w-12 object-contain" />
                </div>
                <div class="flex justify-center relative">
                    <span class="w-4 h-4 bg-deepgreen rounded-full relative z-10 mt-1"></span>
                </div>
                <div class="text-deepgreen">
                    <h3 class="font-medium leading-tight">Verified Profile</h3>
                    <p class="text-xs">
                        No random people.<br />
                        Every member is thoroughly screened.
                    </p>
                </div>
            </li>

            <li class="grid grid-cols-[64px_32px_1fr] gap-4 items-start">
                <div class="flex justify-center">
                    <img src="assets/img/register.png" class="h-12 w-12 object-contain" />
                </div>
                <div class="flex justify-center relative">
                    <span class="w-4 h-4 bg-deepgreen rounded-full relative z-10 mt-1"></span>
                </div>
                <div class="text-deepgreen">
                    <h3 class="font-medium leading-tight">Secure Data Privacy</h3>
                    <p class="text-xs">
                        Clover guarantees full confidentiality for every client.
                    </p>
                </div>
            </li>

            <li class="grid grid-cols-[64px_32px_1fr] gap-4 items-start">
                <div class="flex justify-center">
                    <img src="assets/img/refund.png" class="h-12 w-12 object-contain" />
                </div>
                <div class="flex justify-center relative">
                    <span class="w-4 h-4 bg-deepgreen rounded-full relative z-10 mt-1"></span>
                </div>
                <div class="text-deepgreen">
                    <h3 class="font-medium leading-tight">Refund Guarantee</h3>
                    <p class="text-xs">
                        Guarantee refund commitment fee for unprovided service.
                    </p>
                </div>
            </li>
        </ol>
    </div>

</section>

<section class="bg-purewhite py-12 px-6">
    <div class="max-w-4xl mx-auto">
        <div class="flex flex-row items-center justify-between gap-4">
            <div class="text-left">
                <h2 class="text-3xl font-bold text-deepgreen leading-tight">
                    Connect<br>With Us!
                </h2>
            </div>

            <div class="text-left">
                <p class="text-deepgreen font-semibold text-lg mb-2">Clover</p>
                <p class="text-deepgreen">E: teamsclover@gmail.com</p>
                <p class="text-deepgreen">P: 0823311345189</p>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const carousel = document.getElementById('hero-carousel');
        if (carousel) {
            const options = {
                defaultPosition: 0,
                interval: 3000,
                indicators: {
                    items: [{
                            position: 0,
                            el: carousel.querySelector('[data-carousel-slide-to="0"]')
                        },
                        {
                            position: 1,
                            el: carousel.querySelector('[data-carousel-slide-to="1"]')
                        },
                        {
                            position: 2,
                            el: carousel.querySelector('[data-carousel-slide-to="2"]')
                        }
                    ]
                }
            };

            const carouselInstance = new Carousel(carousel, options);
            carouselInstance.cycle();
        }
    });
</script>
@endpush