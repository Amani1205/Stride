@extends('layout.indexlayout')

@section('content')
<section class="coach-details-section">
    <div class="container">
        <!-- Back Button -->
        <!-- <a href="{{ url()->previous() }}" class="back-button">BACK</a> -->

        <div class="row">
            <!-- Coach Profile Image -->
            <div class="col-md-3 coach-profile">
                <div class="coach-image-container">
                    <img src="{{ Storage::url($coach->image) }}" alt="{{ $coach->user->name }}" class="coach-profile-image">
                </div>
            </div>

            <!-- Coach Information -->
            <div class="col-md-5 coach-info">
                
                    
                    <h1>{{ $coach->user->name }}</h1>
            
                <div class="info-item">
                    <h2><i class="fas fa-football-ball icon-large" style="color:#D59B28;"></i> Sport Specialization:</h2>
                    <p>{{ $coach->user->coaching_sport }}</p>
                </div>
                <div class="info-item">
                    <h2><i class="fas fa-star icon-large" style="color:#D59B28;"></i> Level of Experience:</h2>
                    <p>{{ $coach->user->level_of_experience }}</p>
                </div>
                <div class="info-item">
                    <h2><i class="fas fa-calendar-alt icon-large" style="color:#D59B28;"></i> Years of Experience:</h2>
                    <p>{{ $coach->user->years_of_experience }} years</p>
                </div>
                <br>
                <div class="info-item">
                    <h2><i class="fas fa-money-bill-wave icon-large" style="color:#D59B28;"></i> Rates:</h2>
                    <p>LKR {{ $coach->rate }} per hour</p>
                </div>
                <div class="info-item">
                    <h2><i class="fas fa-phone icon-large" style="color:#D59B28;"></i> Contact Number:</h2>
                    <p>(+{{ $coach->user->contact_number }})</p>
                </div>
                <div class="info-item">
                    <h2><i class="fas fa-envelope icon-large" style="color:#D59B28;"></i> Email Address:</h2>
                    <p>{{ $coach->user->email }}</p>
                </div>
            </div>

            <!-- Available Time Slots -->
            <div class="col-md-4 time-slots">
                <h4>Available time slot(s)</h4>
                <ul>
                    @if(is_array($coach->time_slots) && count($coach->time_slots) > 0)
                        @foreach($coach->time_slots as $slot)
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
@endsection
