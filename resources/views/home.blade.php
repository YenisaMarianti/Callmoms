<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Callmoms | Beranda</title>
</head>
<body>
    <div class="navbar-wrapper">
        <div class="logo-wrapper">
            <img src="{{ asset('images/callmoms-logo.png') }}" alt="Calmoms Logo">
            <span>Calmom's</span>
        </div>
        <div class="hamburger-wrapper">
            <img src="{{ asset('images/icons/hamburger.png') }}" alt="Hamburger Icon" id="openButton">
        </div>
        <div class="navbar-menu">
            <ul>
                <li><a href="#">Beranda</a></li>
                <li><a href="#">Layanan Khusus</a></li>
                <li><a href="#">Catatan Emosi</a></li>
                <li><a href="#">Profil</a></li>
                <li><a href="{{ url('/sign-in') }}">Masuk</a></li>
            </ul>
        </div>
    </div>
    <div class="navbar-slider" id="navbar-slider">
        <div class="navbar-slider-header">
            <div class="logo-wrapper">
                <img src="{{ asset('images/callmoms-logo.png') }}" alt="Calmoms Logo">
                <span>Calmom's</span>
            </div>
            <div class="hamburger-wrapper">
                <img src="{{ asset('images/icons/close.png') }}" alt="Close Icon" id="closeButton">
            </div>
        </div>

        <div class="navbar-slider-menu">
            <ul>
                <li><a href="#">Beranda</a></li>
                <li><a href="#">Layanan Khusus</a></li>
                <li><a href="#">Catatan Emosi</a></li>
                <li><a href="#">Profil</a></li>
                <li><a href="{{ url('/sign-in') }}">Masuk</a></li>
            </ul>
        </div>
    </div>
    <div class="jumbotron-wrapper">
        <img src="{{ asset('images/doctor-preview.png') }}" alt="doctor preview">
        <p><b>The Best</b> mom Mental Health <b>Solution For You</b></p>
    </div>
    <div class="article-wrapper">
        <h3>Artikel</h3>
        <div class="card-article-group">
            <div class="card-article">
                <a href="#">
                    <div class="image-article-wrapper">
                        <img src="{{ asset('images/article.png') }}" alt="Article Image">
                    </div>
                    <div class="article-title">
                        <p>Apa itu Baby Blues?</p>
                    </div>
                </a>
            </div>
            <div class="card-article">
                <a href="#">
                    <div class="image-article-wrapper">
                        <img src="{{ asset('images/article-2.png') }}" alt="Article Image">
                    </div>
                    <div class="article-title">
                        <p>Kenali Ciri-ciri Baby Blues Syndrome Beserta Cara Mengatasinya</p>
                    </div>
                </a>
            </div>
            <div class="card-article">
                <a href="#">
                    <div class="image-article-wrapper">
                        <img src="{{ asset('images/article-3.png') }}" alt="Article Image">
                    </div>
                    <div class="article-title">
                        <p>Mengenal apa itu  Baby Blues dan cara menanganinya</p>
                    </div>
                </a>
            </div>
            <div class="card-article">
                <a href="#">
                    <div class="image-article-wrapper">
                        <img src="{{ asset('images/article-4.png') }}" alt="Article Image">
                    </div>
                    <div class="article-title">
                        <p>Lebih Rileks Pasca Melahirkan dengan Cara Ini</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="recommendation">
        <h3>Rekomendasi Dokter</h3>
        <div class="recommendation-wrapper">
            <div class="card-recommendation">
                <div class="card-photo-doctor">
                    <img src="{{ asset('images/male-doctor.png') }}" alt="Doctor image">
                </div>
                <div class="info-doctor">
                    <p>Dr. Aspa</p>
                    <a href="#">Chat</a>
                </div>
            </div>
            <div class="card-recommendation">
                <div class="card-photo-doctor">
                    <img src="{{ asset('images/male-doctor.png') }}" alt="Doctor image">
                </div>
                <div class="info-doctor">
                    <p>Dr. Aspa</p>
                    <a href="#">Chat</a>
                </div>
            </div>
            <div class="card-recommendation">
                <div class="card-photo-doctor">
                    <img src="{{ asset('images/male-doctor.png') }}" alt="Doctor image">
                </div>
                <div class="info-doctor">
                    <p>Dr. Aspa</p>
                    <a href="#">Chat</a>
                </div>
            </div>
            <div class="card-recommendation">
                <div class="card-photo-doctor">
                    <img src="{{ asset('images/male-doctor.png') }}" alt="Doctor image">
                </div>
                <div class="info-doctor">
                    <p>Dr. Aspa</p>
                    <a href="#">Chat</a>
                </div>
            </div>
            <div class="card-recommendation">
                <div class="card-photo-doctor">
                    <img src="{{ asset('images/male-doctor.png') }}" alt="Doctor image">
                </div>
                <div class="info-doctor">
                    <p>Dr. Aspa</p>
                    <a href="#">Chat</a>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>

<script>
    $(document).ready(function() {
        $("#openButton").click(function() {
            $("#navbar-slider").css("left", "0");
            $("#navbar-slider").css("transition", ".2s ease-in-out");
        });

        $("#closeButton").click(function() {
            $("#navbar-slider").css("left", "-100%");
            $("#navbar-slider").css("transition", ".2s ease-in-out");
        });
    });
</script>