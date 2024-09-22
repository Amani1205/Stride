@extends('layout.indexlayout')

@section('content')

    <section class="grounds-section">
        <h2>Book Grounds</h2>

        <!-- Filter Form -->
        <form action="{{ route('grounds.all') }}" method="GET" class="filter-form">
            <!-- Filter by Rate Range -->
            <label for="rate_range">Filter by Rate Range (LKR):</label>
            <select id="rate_range" name="rate_range" onchange="this.form.submit()">
                <option value="">Any Rate</option>
                @foreach($rateRanges as $range => $label)
                    <option value="{{ $range }}" {{ request('rate_range') == $range ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                @endforeach
            </select>

            <!-- Filter by Capacity Range -->
            <label for="capacity_range">Filter by Capacity:</label>
            <select id="capacity_range" name="capacity_range" onchange="this.form.submit()">
                <option value="">Any Capacity</option>
                @foreach($capacityRanges as $range => $label)
                    <option value="{{ $range }}" {{ request('capacity_range') == $range ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                @endforeach
            </select>
        </form>

        <!-- Display Grounds -->
        <div class="grounds-grid">
            @foreach($grounds as $ground)
                <div class="text-center ground-card">
                    <!-- Wrap Ground Card in a Link -->
                    <a href="{{ route('ground.show', $ground->id) }}" class="ground-link">
                        <!-- Ground Image -->
                        <img src="{{ Storage::url($ground->images[0]) }}" alt="{{ $ground->user->name }}" class="ground-image">
                        <!-- Ground Name -->
                        <h4 class="ground-name">{{ $ground->user->name }}</h4>
                        <!-- Ground Details -->
                        <p class="ground-details">Rate: {{ $ground->rate }} per hour, Capacity: {{ $ground->capacity }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

@endsection
