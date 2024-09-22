@extends('layout.sportslayout')

@section('content')

<section class="sport-hero">
    <!-- Cover Image -->
    <img src="{{ asset('images/Explore Sports.png') }}" alt="Sports Cover Image" class="cover-image">
</section>

<main>
    <section class="sports">
     
        <div class="explore-icons">
            <div class="icon">
                <a href="/athletics">
                    <img src="./images/Athletics.png" alt="Athletics">
                </a>
            </div>
            <div class="icon">
                <a href="/badminton">
                    <img src="./images/Badminton.png" alt="Badminton">
                </a>
            </div>
            <div class="icon">
                <a href="/baseball">
                    <img src="./images/Baseball.png" alt="Baseball">
                </a>
            </div>
            <div class="icon">
                <a href="/basketball">
                    <img src="./images/Basketball.png" alt="Basketball">
                </a>
            </div>
            <div class="icon">
                <a href="/boxing">
                    <img src="./images/Boxing.png" alt="Boxing">
                </a>
            </div>
            <div class="icon">
                <a href="/cricket">
                    <img src="./images/Cricket.png" alt="Cricket">
                </a>
            </div>
            <div class="icon">
                <a href="/chess">
                    <img src="./images/Chess.png" alt="Chess">
                </a>
            </div> 
            <div class="icon">
                <a href="/football">
                    <img src="./images/Football.png" alt="Football">
                </a>
            </div>
            <div class="icon">
                <a href="/hockey">
                    <img src="./images/Hockey.png" alt="Hockey">
                </a>
            </div>
            <div class="icon">
                <a href="/karate">
                    <img src="./images/Karate.png" alt="Karate">
                </a>
            </div>
            <div class="icon">
                <a href="/rugby">
                    <img src="./images/Rugby.png" alt="Rugby">
                </a>
            </div>
            <div class="icon">
                <a href="/swimming">
                    <img src="./images/Swimming.png" alt="Swimming">
                </a>
            </div>
            <div class="icon">
                <a href="/table-tennis">
                    <img src="./images/Table Tennis.png" alt="Table Tennis">
                </a>
            </div>
            <div class="icon">
                <a href="/tennis">
                    <img src="./images/Tennis.png" alt="Tennis">
                </a>
            </div>
            <div class="icon">
                <a href="/volleyball">
                    <img src="./images/Volleyball.png" alt="Volleyball">
                </a>
            </div>
        </div>
    </section>
</main>

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
