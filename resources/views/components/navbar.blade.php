<header>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">
            <img src="./images/Stride Orange.png" alt="Stride Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Sports.html">Sports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="About.html">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Contact.html">Contact Us</a>
                </li>
            </ul>
            <div class="loginbuttonrow">
                @if (Route::has('login'))
                    @auth
                        <x-app-layout>
                        </x-app-layout>
                    @else
                        <a href="{{ route('login') }}" class="loginbtn">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('selection') }}" class="registerbtn">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>
</header>
