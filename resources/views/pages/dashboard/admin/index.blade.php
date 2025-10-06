@extends('layouts.app')

@section('content')

<section>
    <h1>admin dashboard</h1>
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