<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="{{ asset('css/sign-up.css') }}">
    <title>Callmoms - Sign Up</title>
</head>
<body>
    <div class="register-wrapper">
        <h2>Buat Akun Anda</h2>
        <form method="POST" action="{{ route('users.store') }}" >
            @csrf
            <div class="input-text-wrapper">
                <p>Nama</p>
                <input type="text" name="nama" placeholder="Masukkan nama anda" required>
            </div>
            <div class="input-text-wrapper">
                <p>No Telepon</p>
                <input type="number" name="no_telepon" placeholder="Masukkan no Telepon" required>
            </div>
            <div class="input-text-wrapper">
                <p>Peran</p>
                <div>
                    <label><input type="radio" name="peran" value="ibu" checked> Ibu Pra/Pasca melahirkan</label>
                </div>
                <div>
                    <label><input type="radio" name="peran" value="keluarga"> Keluarga / Lingkungan</label>
                </div>
            </div>
            <div class="input-text-wrapper">
                <p>Jenis Kelamin</p>
                <div>
                    <label><input type="radio" name="jenis_kelamin" value="perempuan" checked> Perempuan</label>
                    <label><input type="radio" name="jenis_kelamin" value="laki-laki" disabled> Laki-laki</label>
                </div>
            </div>
            <div class="input-text-wrapper">
                <p>Sandi</p>
                <input type="password" name="sandi" id="sandi" placeholder="Masukkan kata sandi" required>
            </div>
            <div class="input-text-wrapper">
                <p>Konfirmasi Sandi</p>
                <input type="password" name="konfirmasi_sandi" id="konfirmasi_sandi" placeholder="Masukkan ulang kata sandi" required>
                <span id="konfirmasi_sandi_error" class="error-span"></span>
            </div>
            <button type="submit">Daftar</button>
        </form>
        <p class="account-exist">Sudah memiliki akun? <a href="{{ url('/sign-in') }}">Masuk disini</a></p>
    </div>
    @if(Session::has('success-registration'))
        <script>
            swal({
                title: "Berhasil",
                text: "{{ Session::get('success-registration') }}",
                icon: 'success',
                button: "OK",
            }).then((value) => {
                if (value) {
                    window.location.href = "{{ url('/sign-in') }}";
                }
            });
        </script>
    @endif

    @if(Session::has('failed-registration'))
        <script>
            swal({
                title: "Gagal",
                text: "{{ Session::get('failed-registration') }}",
                icon: 'warning',
                button: "OK",
            })
        </script>
    @endif
</body>

<script>
    const peranRadio = document.getElementsByName('peran');
    const jenisKelaminRadio = document.getElementsByName('jenis_kelamin');

    for(let i = 0; i < peranRadio.length; i++) {
        peranRadio[i].addEventListener('change', function() {
            if(this.value === 'ibu') {
                jenisKelaminRadio[0].disabled = false;
                jenisKelaminRadio[1].disabled = true;
                jenisKelaminRadio[0].checked = true;
            } else if (this.value === 'keluarga') {
                jenisKelaminRadio[0].disabled = false;
                jenisKelaminRadio[1].disabled = false;
            }
        })
    }

    const sandiInput = document.getElementById('sandi');
    const konfirmasiSandiInput = document.getElementById('konfirmasi_sandi');
    const konfirmasiSandiError = document.getElementById('konfirmasi_sandi_error');

    konfirmasiSandiInput.addEventListener('keyup', function() {
        if(sandiInput.value !== konfirmasiSandiInput.value) {
            konfirmasiSandiError.textContent = 'Kata sandi belum sesuai';
        } else {
            konfirmasiSandiError.textContent = '';
        }
    });

</script>

</html>