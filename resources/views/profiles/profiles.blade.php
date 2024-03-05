@extends('layouts.layout')

@section('title', 'Callmoms | Profile')

@section('content')
    <div class="online-consultation-wrapper">
        <p class="title-each-menu">Profile Settings</p>
        <div class="profile-wrapper">
            @if(session('users_data')->id != request()->segment(2))
                @php
                    return redirect()->route('profile', ['id' => session('users_data')->id]);
                @endphp
            @endif

            <div class="profile-section">
                <form method="POST" action="{{ route('users.update', ['id' => session('users_data')->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="profile-heading">
                        @if($data->foto === null)
                            @if(session()->has('users_data') && session('users_data')->jenis_kelamin === 'laki-laki')
                                <img src="{{ asset('images/man.png') }}" alt="Man Image">
                            @elseif(session()->has('users_data') && session('users_data')->jenis_kelamin === 'perempuan')
                                <img src="{{ asset('images/perempuan.png') }}" alt="Woman Image">
                            @endif
                        @else
                            <img src="{{ asset('uploads/' . $data->foto) }}" alt="User Image">
                        @endif
                        <p>{{ $data->nama }}</p>
                    </div>
                    <input type="text" name="nama" value="{{ $data->nama }}" placeholder="Masukkan nama anda">
                    <input type="number" name="no_telepon" value="{{ $data->no_telepon }}" placeholder="Masukkan no hp anda">
                    <input type="text" name="alamat" value="{{ $data->alamat }}" placeholder="Masukkan alamat anda">
                    <input type="file" id="fileInput" name="foto" style="display:none">
                    <label for="fileInput" class="custom-file-input">Pilih File</label>
                    <span class="custom-file-label">{{ $data->foto ? $data->foto : 'Tidak ada file yang dipilih' }}</span>
                    <input type="password" name="sandi" id="sandi" placeholder="Masukkan password baru anda">
                    <input type="password" id="konfirmasi_sandi" placeholder="Konfirmasi password baru anda">
                    <span id="konfirmasi_sandi_error" class="error-span"></span>
                    <button type="submit" id="submitButton">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
    @if(Session::has('success-update-profile'))
        <script>
            swal({
                title: "Berhasil",
                text: "{{ Session::get('success-update-profile') }}",
                icon: 'success',
                button: "OK",
            })
        </script>
    @endif

    @if(Session::has('failed-update-profile'))
    <script>
        swal({
            title: "Gagal",
            text: "{{ Session::get('failed-update-profile') }}",
            icon: 'warning',
            button: "OK",
        })
    </script>
@endif
@endsection

@section('script-function')
    <script>
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

    <script>
        var fotoValue = @json($data->foto);

        document.getElementById('fileInput').addEventListener('change', function(e) {
            var fileName = e.target.files[0].name;
            document.querySelector('.custom-file-label').textContent = fileName;
            document.getElementById('fileInput').required = false;
        });

        document.getElementById('submitButton').addEventListener('click', function() {
            if (!document.getElementById('fileInput').value && !fotoValue) {
                document.getElementById('fileInput').required = true;
            } else {
                document.getElementById('fileInput').required = false;
            }
        });
    </script>
@endsection