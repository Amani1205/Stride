@extends('layout.indexlayout')

@section('content')
<section class="ground-details-section">

<div class="back">
        <a href="{{ url()->previous() }}" class="back-button">GO BACK</a>
</div>
    <div class="container">
        <div class="row">
            <!-- Ground Profile Images -->
            <div class="col-md-3 ground-profile">
                <div class="ground-image-container">
                    @if(is_array($ground->images) && count($ground->images) > 0)
                        @foreach($ground->images as $image)
                            <img src="{{ Storage::url($image) }}" alt="{{ $ground->user->name }}" class="ground-display-image">
                        @endforeach
                    @else
                        <p>No images available for this ground.</p>
                    @endif
                </div>
            </div>

            <!-- Ground Information -->
            <div class="col-md-5 ground-info">
                <h1>{{ $ground->user->name }}</h1>
                <div class="info-item">
                    <h2><i class="fas fa-map-marker-alt icon-large" style="color:#D59B28;"></i> Location:</h2>
                    <p>{{ $ground->user->stadium_address }}</p>
                </div>
                <div class="info-item">
                    <h2><i class="fas fa-money-bill-wave icon-large" style="color:#D59B28;"></i> Rate:</h2>
                    <p>LKR {{ $ground->rate }} per hour</p>
                </div>
                <div class="info-item">
                    <h2><i class="fas fa-users icon-large" style="color:#D59B28;"></i> Capacity:</h2>
                    <p>{{ $ground->capacity }} people</p>
                </div>
                <br>
                <div class="info-item">
                    <h2><i class="fas fa-phone icon-large" style="color:#D59B28;"></i> Contact Number:</h2>
                    <p>(+{{ $ground->user->contact_number }})</p>
                </div>
                <div class="info-item">
                    <h2><i class="fas fa-envelope icon-large" style="color:#D59B28;"></i> Email Address:</h2>
                    <p>{{ $ground->user->email }}</p>
                </div>
            </div>

            <!-- Available Time Slots -->
            <div class="col-md-4 time-slots">
                <h4>Available time slot(s)</h4>
                <ul>
                    @if(is_array($ground->time_slots) && count($ground->time_slots) > 0)
                        @foreach($ground->time_slots as $slot)
                            <li class="time-slot">
                                {{ $slot['day'] }}: {{ $slot['start_time'] }} - {{ $slot['end_time'] }}
                            </li>
                        @endforeach
                    @else
                        <li>No available time slots.</li>
                    @endif
                </ul>
            </div>
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
