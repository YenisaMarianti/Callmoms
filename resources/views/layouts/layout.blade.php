<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <title>@yield('title')</title>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div class="sidebar-wrapper">
        <div class="sidebar-header">
            <img src="{{ asset('images/callmoms-logo.png') }}" alt="Callmoms Logo">
            <h3>Callmom's</h3>
        </div>

        <div class="sidebar-menus">
            @if(session()->has('users_data') && session('users_data')->peran === 'dokter')
                <ul>
                    <li><a href="#">Beranda</a></li>
                    <li><a href="{{ url('/show-messages') }}">Konsultasi Online</a></li>
                    <li><a href="{{ url('/discussion-forum') }}">Forum Diskusi</a></li>
                    <li><a href="{{ url('/profile/' . session('users_data')->id) }}">Profil</a></li>
                </ul>
            @elseif(session()->has('users_data') && session('users_data')->peran !== 'dokter')
                <ul>
                    <li><a href="#">Beranda</a></li>
                    <li>
                        <a href="#" id="layanan-khusus-toggle">Layanan Khusus</a>
                        <ul class="dropdown-menu" id="layanan-khusus-menu">
                            <li><a href="{{ url('/online-consultation') }}">Konsultasi Online</a></li>
                            <li><a href="{{ url('/discussion-forum') }}">Forum Diskusi</a></li>
                            <li><a href="{{ url('/meditation') }}">Meditasi</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Tes Kondisi Perasaan</a></li>
                    <li><a href="{{ url('/profile/' . session('users_data')->id) }}">Profil</a></li>
                </ul>
            @endif
        </div>
    </div>
    <div class="header-wrapper">
        <div class="profile-corner">
            @if ((session()->has('users_data') && session('users_data')->peran === 'ibu') || (session()->has('users_data') && session('users_data')->peran === 'keluarga' && session('users_data')->jenis_kelamin === 'perempuan'))
                <p>Hi Moms, {{ session('users_data')->nama }}</p>
            @elseif(session()->has('users_data') && session('users_data')->jenis_kelamin === 'laki-laki' && session('users_data')->peran !== 'dokter')
                <p>Hi, {{ session('users_data')->nama }}</p>
            @elseif(session()->has('users_data') && session('users_data')->peran === 'dokter')
                <p>Hi dok, {{ session('users_data')->nama }}</p>
            @endif
            <div class="profile-pic-wrapper" id="profile-pic">
                @if ((session()->has('users_data') && session('users_data')->peran === 'ibu') || (session()->has('users_data') && session('users_data')->peran === 'keluarga' && session('users_data')->jenis_kelamin === 'perempuan'))
                    <img src="{{ asset('images/woman.png') }}">
                @elseif(session()->has('users_data') && session('users_data')->jenis_kelamin === 'laki-laki' && session('users_data')->peran !== 'dokter')
                    <img src="{{ asset('images/man.png') }}">
                @elseif(session()->has('users_data') && session('users_data')->peran === 'dokter' && session('users_data')->jenis_kelamin === 'perempuan')
                    <img src="{{ asset('images/female-doctor.jpg') }}">
                @elseif(session()->has('users_data') && session('users_data')->peran === 'dokter' && session('users_data')->jenis_kelamin === 'laki-laki')
                    <img src="{{ asset('images/male-doctor.jpg') }}">
                @endif
            </div>
            <div class="logout-wrapper" id="logout-wrapper">
                <form method="POST" action="{{ url('/logout') }}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>
    </div>
    <div class="content-wrapper">
        @yield('content')
    </div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var layananKhususToggle = document.getElementById('layanan-khusus-toggle');
        var layananKhususMenu = document.getElementById('layanan-khusus-menu');
        var toggleProfile = document.getElementById('profile-pic');
        var boxLogout = document.getElementById('logout-wrapper');

        toggleProfile.addEventListener('click', function() {
            if(boxLogout.style.display === 'block') {
                boxLogout.style.display = 'none';
            } else {
                boxLogout.style.display = 'block';
            }
        })

        layananKhususToggle.addEventListener('click', function() {
            if(layananKhususMenu.style.display === 'block') {
                layananKhususMenu.style.display = 'none';
            } else {
                layananKhususMenu.style.display = 'block';
            }
        })
    })
</script>

@yield('script-function')

</html>