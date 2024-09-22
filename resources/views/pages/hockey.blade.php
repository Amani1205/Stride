@extends('layout.indexlayout')

@section('content')
<section class="sport-hero">
    <!-- Cover Image -->
    <img src="{{ asset('images/Covers/Hockey.png') }}" alt="Cricket Cover Image" class="cover-image">
</section>

<section class="coaches-section">
    <h2>Hire Coaches</h2>
    <div class="coaches-grid">
        @foreach($coaches as $coach)
            <a href="{{ route('coach.show', $coach->id) }}" class="coach-link">
                <div class="coach-card text-center">
                    <!-- Coach Image -->
                    <img src="{{ Storage::url($coach->image) }}" alt="{{ $coach->user->name }}" class="coach-image">
                    
                    <!-- Coach Name -->
                    <h4 class="coach-name">{{ $coach->user->name }}</h4>
                    <!-- Coach Level of Experience -->
                    <p class="coach-experience">{{ $coach->user->level_of_experience }} Level</p>
                </div>
            </a>
        @endforeach
    </div>
</section>


<section class="grounds-section">
    <h2>Book Grounds</h2>
    <div class="grounds-grid">
        @foreach($grounds as $ground)
            <div class="ground-card text-center">
                <!-- Wrap Ground Card in a Link -->
                <a href="{{ route('ground.show', $ground->id) }}" class="ground-link">
                    <!-- Ground Image -->
                    <img src="{{ Storage::url($ground->images[0]) }}" alt="{{ $ground->user->name }}" class="ground-image">
                    <!-- Ground Name -->
                    <h4 class="ground-name">{{ $ground->user->name }}</h4>
                    <!-- Ground Details -->
                    <p class="ground-details">Rate: {{ $ground->rate }} per hour Capacity: {{ $ground->capacity }}</p>
                </a>
            </div>
        @endforeach
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