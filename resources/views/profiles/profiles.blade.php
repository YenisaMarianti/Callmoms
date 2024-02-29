@extends('layouts.layout')

@section('title', 'Callmoms | Profile')

@section('content')
    <div class="online-consultation-wrapper">
        <p class="title-each-menu">Profile</p>
        <div class="profile-wrapper">
            @if(session('users_data')->id != request()->segment(2))
                @php
                    header("Location: /profile/" . session('users_data')->id);
                    exit();
                @endphp
            @endif

            <div class="profile-section">
                <form method="POST" action="{{ route('users.update', ['id' => session('users_data')->id]) }}">
                    @csrf
                    <input type="text" name="nama" value="{{ $data->nama }}" placeholder="Masukkan nama anda">
                    <input type="number" name="no_telepon" value="{{ $data->no_telepon }}" placeholder="Masukkan no hp anda">
                    <input type="password" name="sandi" placeholder="Masukkan password baru anda">
                    <button type="submit">Update Profile</button>
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
