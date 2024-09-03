@extends('layout.indexlayout')

@section('content')
<section class="hero">
    <div class="hero-text">
        <h1>Find your greatness.</h1>
        <p>Welcome to Stride, where opportunities await for athletes to connect,<br> train, and achieve greatness on their journey.</p>
    </div>
</section>

<section class="explore-sports">
    <h2>EXPLORE SPORTS</h2>
    <div class="sports-icons">
        <div class="sport-icon">
            <a href="/cricket">
                <img src="./images/Cricket.png" alt="Cricket">
                
            </a>
        </div>
        <div class="sport-icon">
            <a href="/football">
                <img src="./images/Football.png" alt="Football">
                
            </a>
        </div>
        <div class="sport-icon">
            <a href="/basketball">
                <img src="./images/Basketball.png" alt="Basketball">
                
            </a>
        </div>
        <div class="sport-icon">
            <a href="/rugby">
                <img src="./images/Rugby.png" alt="Rugby">
                
            </a>
        </div>
        <div class="sport-icon">
            <a href="/boxing">
                <img src="./images/Boxing.png" alt="Boxing">
               
            </a>
        </div>
        <div class="sport-icon">
            <a href="/sports">
                <img src="./images/More.png" alt="See More">
            </a>    
        </div>
    </div>
</section>


<section class="about-stride">
    <img src="./images/Stride Orange.png" alt="Stride Logo">
    <h2>ABOUT STRIDE</h2>
    <p>Welcome to Stride, your go-to platform for booking stadiums and hiring professional coaches. Designed for athletes of all levels, Stride offers seamless access to top-notch facilities and expert guidance. Discover a community dedicated to helping you elevate your game and achieve your fullest potential. Find your greatness with Stride.</p>
</section>

<section class="testimonials">
    <div class="testimonial">
        <img src="./images/profile-user.png" alt="Alex Johnson">
        <h3>Alex Johnson</h3>
        <p>"Amazing platform! Booking stadiums has never been easier. Highly recommend!"</p>
    </div>
    <div class="testimonial">
        <img src="./images/profile-user.png" alt="Jamie Lee">
        <h3>Jamie Lee</h3>
        <p>"Great experience! Found the perfect coach for my training needs."</p>
    </div>
    <div class="testimonial">
        <img src="./images/profile-user.png" alt="Jake Hart">
        <h3>Jake Hart</h3>
        <p>"Great UI! its easy to use and find things."</p>
    </div>
    <div class="testimonial">
        <img src="./images/profile-user.png" alt="Taylor Smith">
        <h3>Taylor Smith</h3>
        <p>"Excellent service! Convenient and user-friendly for all athletes."</p>
    </div>
</section>

@endsection
