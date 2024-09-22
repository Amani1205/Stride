@extends('layout.indexlayout')

@section('content')


<section class="sport-hero">
    <!-- Cover Image -->
    <img src="{{ asset('images/Homecover.png') }}" alt="Sports Cover Image" class="cover-image">
</section>

<div class="main-about">
<section class="about-stride">
    <img src="{{ asset('images/Stride Orange.png') }}" alt="Stride Logo">
    <h2>Welcome, {{ Auth::check() ? Auth::user()->name : 'Guest' }}</h2>
    <p>Welcome to Stride, your go-to platform for booking stadiums and hiring professional coaches. Designed for athletes of all levels, Stride offers seamless access to top-notch facilities and expert guidance. Discover a community dedicated to helping you elevate your game and achieve your fullest potential. Find your greatness with Stride.</p>
</section>
</div>

<div class="main-impact">
<section class="impact-numbers">
    <div class="number">
        <span class="count" data-count="15">0</span>+
        <p>Sports</p>
    </div>
    <div class="number">
        <span class="count" data-count="10000">0</span>+
        <p>Users</p>
    </div>
    <div class="number">
        <span class="count" data-count="40">0</span>+
        <p>Grounds</p>
    </div>
    <div class="number">
        <span class="count" data-count="100">0</span>+
        <p>Coaches</p>
    </div>
</section>
</div>  

<section class="explore-sports">
    <h2>EXPLORE SPORTS</h2>
    <div class="sports-icons">
        @php
            $sports = [
                ['url' => '/cricket', 'image' => 'Cricket.png', 'alt' => 'Cricket'],
                ['url' => '/football', 'image' => 'Football.png', 'alt' => 'Football'],
                ['url' => '/basketball', 'image' => 'Basketball.png', 'alt' => 'Basketball'],
                ['url' => '/rugby', 'image' => 'Rugby.png', 'alt' => 'Rugby'],
                ['url' => '/boxing', 'image' => 'Boxing.png', 'alt' => 'Boxing'],
                ['url' => '/sports', 'image' => 'More.png', 'alt' => 'See More']
            ];
        @endphp

        @foreach($sports as $sport)
            <div class="sport-icon">
                <a href="{{ $sport['url'] }}">
                    <img src="{{ asset('images/' . $sport['image']) }}" alt="{{ $sport['alt'] }}">
                </a>
            </div>
        @endforeach
    </div>
</section>


<div class="main-testi">
<section class="testimonials">
    <h2 class="testi-title">What Our Users Say</h2>
    <div class="container">
        <div class="row">
            @php
                $testimonials = [
                    ['name' => 'Ashen ', 'text' => 'Amazing platform! Finding stadiums has never been easier. Highly recommend!', 'image' => 'profile.jpg'],
                    ['name' => 'Avishka', 'text' => 'Great experience! Found the perfect coach for my training needs.', 'image' => 'profile1.jpg'],
                    ['name' => 'Chamari', 'text' => "Great UI! It's easy to use and find things.", 'image' => 'profile3.jpg'],
                    ['name' => 'Vikum', 'text' => 'Excellent service! Convenient and user-friendly for all athletes.', 'image' => 'profile2.jpg']
                ];
            @endphp

            @foreach($testimonials as $testimonial)
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card testimonial-card shadow-sm h-100">
                        <img src="{{ asset('images/' . $testimonial['image']) }}" class="card-img-top rounded-circle mx-auto mt-3 testimonial-img" alt="{{ $testimonial['name'] }}">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $testimonial['name'] }}</h5>
                            <p class="card-text">"{{ $testimonial['text'] }}"</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    function animateCount(element, target) {
        let count = 0;
        const increment = target / 150;

        function updateCount() {
            count += increment;
            if (count < target) {
                element.innerText = Math.floor(count);
                requestAnimationFrame(updateCount);
            } else {
                element.innerText = target;
            }
        }

        updateCount();
    }

    const numbers = document.querySelectorAll('.count');
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = parseInt(entry.target.getAttribute('data-count'), 10);
                animateCount(entry.target, target);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    numbers.forEach(number => {
        observer.observe(number);
    });
});


window.addEventListener('mouseover', initLandbot, { once: true });
window.addEventListener('touchstart', initLandbot, { once: true });
var myLandbot;
function initLandbot() {
  if (!myLandbot) {
    var s = document.createElement('script');s.type = 'text/javascript';s.async = true;
    s.addEventListener('load', function() {
      var myLandbot = new Landbot.Livechat({
        configUrl: 'https://storage.googleapis.com/landbot.online/v3/H-2610841-QMM4O0A78FVCR1VF/index.json',
      });
    });
    s.src = 'https://cdn.landbot.io/landbot-3/landbot-3.0.0.js';
    var x = document.getElementsByTagName('script')[0];
    x.parentNode.insertBefore(s, x);
  }
}

</script>

@endsection
