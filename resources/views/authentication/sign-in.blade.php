<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;700&display=swap"
        rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="{{ asset('css/sign-in.css') }}">
    <title>Callmoms - Sign In</title>
</head>

<body>
    <div class="wrapper-login">
        <h1>Selamat Datang</h1>
        <form method="POST" action="{{ route('users.process-login') }}">
            @csrf
            <label for="phoneNumber">No Telepon</label>
            <input type="text" id="phoneNumber" name="no_telepon" inputmode="numeric" placeholder="Masukkan no telepon" required>
            <label for="password">Kata Sandi</label>
            <input type="password" id="password" name="sandi" placeholder="Masukkan kata sandi" required>
            @error('message')
                <script>
                    swal({
                        title: "Gagal",
                        text: "Username atau password yang anda masukkan salah",
                        icon: 'warning',
                        button: "OK",
                    })
                </script>
            @enderror
            <button type="submit">Masuk</button>
            <p>Tidak terdaftar? <a href="{{ url('/sign-up') }}" class="create-account-link">Buat Akun</a></p>
        </form>
    </div>
</body>

</html>
