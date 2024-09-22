<header>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <!-- Logo Section -->
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/Stride Orange.png') }}" alt="Stride Logo">
        </a>

        <!-- Hamburger Menu Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsing Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="mb-2 navbar-nav me-auto mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ (Route::is('index')) ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (Route::is('sports')) ? 'active' : '' }}" href="{{ url('/sports') }}">Sports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (Route::is('coaches.all')) ? 'active' : '' }}" href="{{ url('/coaches') }}">Coaches</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (Route::is('grounds.all')) ? 'active' : '' }}" href="{{ url('/grounds') }}">Grounds</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (Route::is('about')) ? 'active' : '' }}" href="{{ url('/about') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (Route::is('contact')) ? 'active' : '' }}" href="{{ url('/contact') }}">Contact Us</a>
                </li>
            </ul>

            <!-- Login/Register Buttons -->
            <div class="loginbuttonrow d-flex">
                @if (Route::has('login'))
                    @auth
                        <x-app-layout></x-app-layout>
                    @else
                        <a href="{{ route('login') }}" class="btn loginbtn me-2">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('selection') }}" class="btn registerbtn">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>
</header>
