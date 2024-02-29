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

    <link rel="stylesheet" href="{{ asset('css/sign-in.css') }}">
    <title>Callmoms - Sign In</title>
</head>
<body>
    <div class="login-wrapper">
        <h2>Selamat Datang</h2>
        <form method="POST" action="{{ route('users.process-login') }}">
            @csrf
            <div class="input-text-wrapper">
                <p>No Telepon</p>
                <input type="number" name="no_telepon" placeholder="Masukkan no Telepon">
            </div>
            <div class="input-text-wrapper">
                <p>Kata Sandi</p>
                <input type="password" name="sandi" placeholder="Masukkan kata sandi">
            </div>
            @error('message')
                <div class="error">{{ $message }}</div>
            @enderror
            <button>Masuk</button>
        </form>
        <p class="account-unexist">Tidak terdaftar? <a href="{{ url('/sign-up') }}">Buat Akun</a></p>
    </div>
</body>

</html>