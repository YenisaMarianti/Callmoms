@extends('layouts.layout')

@section('title', 'Callmoms | Konsultasi Online')

@section('content')
    <div class="online-consultation-wrapper">
        <p class="title-each-menu">Konsultasi Online</p>
        <div class="doctors-card-wrapper">
            @foreach ($doctors as $item)
                <div class="doctor-card">
                    @if ($item->jenis_kelamin === 'perempuan')
                        <img src="{{ asset('images/female-doctor.jpg') }}">
                    @elseif($item->jenis_kelamin === 'laki-laki')
                        <img src="{{ asset('images/male-doctor.jpg') }}">
                    @endif
                    <p>{{ $item->nama }}</p>
                    <a href="{{ url('/chat/doctor/'.$item->id) }}">Chat Sekarang</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection