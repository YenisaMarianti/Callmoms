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
    <div class="wrapper-register">
        <h1>Buat Akun Anda</h1>
        <form method="POST" action="{{ route('users.store') }}" >
            @csrf
            <label for="name">Nama</label>
            <input type="text" id="name" name="nama" placeholder="Masukkan nama anda" required />
            <label for="phoneNumber">No Telepon</label>
            <input type="text" id="phoneNumber" name="no_telepon" inputmode="numeric"
                placeholder="Masukkan no telepon" required />
            <label>Peran</label>
            <div>
                <span><input type="radio" name="peran" id="ibu" value="ibu" checked /> <label for="ibu" style="cursor: pointer;">Ibu Pra /
                        Pasca
                        Melahirkan</label>
                </span>
                <span><input type="radio" name="peran" id="keluarga" value="keluarga" />
                    <label for="keluarga" style="cursor: pointer;">Keluarga</label></span>
            </div>
            <label>Jenis Kelamin</label>
            <div style="display: flex; align-items: center; gap: 0.625rem;">
                <span><input type="radio" name="jenis_kelamin" id="wanita" value="perempuan" checked /> <label for="wanita"
                        style="cursor: pointer;">Perempuan</label>
                </span>
                <span><input type="radio" name="jenis_kelamin" id="pria" value="laki-laki" disabled />
                    <label for="pria" style="cursor: pointer;">Laki-laki</label></span>
            </div>
            <label for="sandi">Sandi</label>
            <input type="password" id="sandi" name="sandi" placeholder="Masukkan kata sandi" required />
            <label for="konfirmasi_sandi">Konfirmasi Sandi</label>
            <input type="password" name="konfirmasi_sandi" id="konfirmasi_sandi" placeholder="Masukkan ulang kata sandi" required />
            <span id="konfirmasi_sandi_error" class="error-span"></span>
            <button type="submit">Daftar</button>
            <p>
                Sudah memiliki akun?
                <a href="{{ url('/sign-in') }}" class="login-account-link">Masuk
                    disini</a>
            </p>
        </form>
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