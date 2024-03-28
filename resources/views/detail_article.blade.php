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
    <link rel="stylesheet" href="{{ asset('css/detail_article.css') }}">
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
    <div class="article-detail">
        <h3>Lebih Rileks Pasca Melahirkan dengan Cara Ini</h3>
        <div class="image-detail-wrapper">
            <img src="{{ asset('images/article.png') }}" alt="Image article">
        </div>
        <div class="long-text-wrapper">
            <pre>What is Lorem Ipsum? 
                
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Why do we use it?

It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). Where does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance.

The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32. The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham. Where can I get some? There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.

All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
            </pre>
        </div>
    </div>
    <div class="call-doctor-popup">
        <img src="{{ asset('images/male-doctor.png') }}" alt="Doctor image">
    </div>
    <div class="footer">
        <div class="footer-wrapper">
            <div class="footer-image">
                <img src="{{ asset('images/callmoms-logo.png') }}" alt="Callmoms logo">
                <p>Calmoms</p>
            </div>
            <div class="call-us">
                <span>Hubungi kami <a href="#">0852xxxxxxxx</a></span>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; Copyright Calmoms | Institut Teknologi Del</p>
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
