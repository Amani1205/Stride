@extends('layout.indexlayout')

@section('content')
<section class="ground-details-section">
    <div class="ground-details-container">
        <div class="ground-details-row">
            <!-- Ground Profile Images -->
            <div class="ground-profile">
                @if(is_array($ground->images) && count($ground->images) > 0)
                    @foreach($ground->images as $image)
                        <img src="{{ Storage::url($image) }}" alt="{{ $ground->user->name }}" class="ground-display-image">
                    @endforeach
                @else
                    <p>No images available for this ground.</p>
                @endif
            </div>

            <!-- Ground Information -->
            <div class="ground-info">
                <h1>{{ $ground->user->name }}</h1>
                <p><i class="fas fa-map-marker-alt icon-large"></i> <strong>Location:</strong> {{ $ground->user->stadium_address }}</p>
                <p><i class="fas fa-money-bill-wave icon-large"></i> <strong>Rate:</strong> LKR {{ $ground->rate }} per hour</p>
                <p><i class="fas fa-users icon-large"></i> <strong>Capacity:</strong> {{ $ground->capacity }} people</p>
                <br>
                <p><i class="fas fa-phone icon-large"></i> <strong>Contact Number:</strong> (+{{ $ground->user->contact_number }})</p>
                <p><i class="fas fa-envelope icon-large"></i> <strong>Email Address:</strong> {{ $ground->user->email }}</p>
            </div>

            <!-- Available Time Slots -->
            <div class="time-slots">
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
@endsection
