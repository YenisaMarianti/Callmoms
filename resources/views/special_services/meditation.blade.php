@extends('layouts.layout')

@section('title', 'Callmoms | Meditasi')

@section('content')
    <div class="meditation-wrapper">
        <p class="title-each-menu">Meditasi</p>
        <div class="meditation-section">
            @foreach (File::files(public_path('storage/meditations')) as $file)
                <div class="meditation-card">
                    <div class="meditation-image">
                        <img src="{{ asset('images/meditation.png') }}" alt="Meditation Image">
                    </div>
                    <div class="audio-control">
                        <audio controls style="width: 100%">
                            <source src="{{ asset('storage/meditations/' . basename($file)) }}" type="audio/mp3">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection