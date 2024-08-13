<div class="container">
    <h2>HIRE COACHES</h2>
    <div class="row">
        @foreach($coaches as $coach)
            <div class="text-center col-md-3">
                <div class="coach-card">
                    <!-- Coach Image -->
                    <img src="{{ Storage::url($coach->user->image) }}" alt="{{ $coach->user->name }}" class="rounded-circle" style="width: 100px; height: 100px;">
                    <!-- Coach Name -->
                    <h4>{{ $coach->user->name }}</h4>
                    {{-- <img src="{{url('storage/',$coach->user->image)}}" class="card-img-top" alt="Product Image"> --}}
                    <!-- Coach Level of Experience -->
                    <p>{{ $coach->user->level_of_experience }} level</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
