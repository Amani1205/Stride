@extends('layout.indexlayout')

@section('content')
    <section class="coaches-section">
        <h2>All Coaches</h2>

        <!-- Filter Form -->
        <form action="{{ route('coaches.all') }}" method="GET" class="filter-form">
            <label for="level_of_experience">Filter by Experience Level:</label>
            <select id="level_of_experience" name="level_of_experience" onchange="this.form.submit()">
                <option value="">All Levels</option>
                @foreach($experienceLevels as $level)
                    <option value="{{ $level }}" {{ request('level_of_experience') == $level ? 'selected' : '' }}>
                        {{ $level }}
                    </option>
                @endforeach
            </select>

            <label for="rate_range">Filter by Rate Range (LKR):</label>
            <select id="rate_range" name="rate_range" onchange="this.form.submit()">
                <option value="">Any Rate</option>
                @foreach($rateRanges as $range => $label)
                    <option value="{{ $range }}" {{ request('rate_range') == $range ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                @endforeach
            </select>
        </form>

        <div class="coaches-grid">
            @foreach($coaches as $coach)
                <a href="{{ route('coach.show', $coach->id) }}" class="coach-link">
                    <div class="text-center coach-card1">
                        <!-- Coach Image -->
                        <img src="{{ Storage::url($coach->image) }}" alt="{{ $coach->user->name }}" class="coach-image">

                        <!-- Coach Name -->
                        <h4 class="coach-name">{{ $coach->user->name }}</h4>

                        <!-- Coach Level of Experience -->
                        <p class="coach-experience">{{ $coach->user->level_of_experience }} Level</p>

                        <!-- Coach Sport -->
                        <p class="coach-sport">{{ $coach->user->coaching_sport }}</p>

                        <!-- Coach Rate -->
                        <p class="coach-rate">LKR {{ $coach->rate }} per hour</p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
