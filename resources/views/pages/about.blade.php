@extends('layout.indexlayout')

@section('content')
<div class="about-container">    
    <section class="banner-section">
            <div class="banner-text">
                <h1>What is Stride?</h1>
                <p>Welcome to Stride, your go-to platform for booking stadiums and hiring professional coaches. Designed for athletes of all levels, Stride offers seamless access to top-notch facilities and expert guidance. Discover a community dedicated to helping you elevate your game and achieve your fullest potential. Find your greatness with Stride.</p>
            </div>
    </section>
    
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card vision-card shadow-sm h-100">
                    <div class="card-body">
                        <h2 class="card-title">Our Vision</h2>
                        <p class="card-text">To empower every athlete with easy access to world-class facilities and coaching, fostering a community that thrives on excellence, perseverance, and passion.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card mission-card shadow-sm h-100">
                    <div class="card-body">
                        <h2 class="card-title">Our Mission</h2>
                        <p class="card-text">To provide a seamless platform that connects athletes with the best resources, enabling them to achieve their goals and push the boundaries of their potential.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Photo Grid Section -->
        <h2 class="grid-title">Our Athletes in Action</h2>
        <div class="photo-grid">
            
            <div class="photo"><img src="{{ asset('images/1.png') }}" alt="1"></div>
            <div class="photo"><img src="{{ asset('images/2.png') }}" alt="1"></div>
            <div class="photo"><img src="{{ asset('images/3.png') }}" alt="1"></div>
            <div class="photo"><img src="{{ asset('images/4.png') }}" alt="1"></div>
            <div class="photo"><img src="{{ asset('images/5.png') }}" alt="1"></div>
            <div class="photo"><img src="{{ asset('images/6.png') }}" alt="1"></div>
        </div>
    </div>


     <!-- Our Team Section -->
     <section class="team-section">
        <h2>Meet Our Team</h2>
        <div class="team-grid">
            <div class="team-member">
                <img src="{{ asset('images/amani.png') }}" alt="Team Member 1">
                <h3>Amani Afgar</h3>
                
            </div>
            <div class="team-member">
                <img src="{{ asset('images/Thineth1.png') }}" alt="Team Member 2">
                <h3>Thineth Kurukulasuriya</h3>
             
            </div>
            <div class="team-member">
                <img src="{{ asset('images/Shumair1.png') }}" alt="Team Member 3">
                <h3>Shumair Ahamadh</h3>
                
            </div>
            <div class="team-member">
                <img src="{{ asset('images/hansaja.png') }}" alt="Team Member 4">
                <h3>Hansaja Perera</h3>
                
            </div>
        </div>
    </section>

<script>
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
