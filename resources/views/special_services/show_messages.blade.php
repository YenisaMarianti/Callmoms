@extends('layouts.layout')

@section('title', 'Callmoms | Konsultasi Online')

@section('content')
    <div class="show-message-wrapper">
        <p class="title-each-menu">Konsultasi Online</p>
            @foreach ($users as $item)
                <div class="customer-chat-wrapper">
                    <p>{{ $item['nama'] }}</p>
                    <div class="last-message-display" onclick="window.location='{{ url('/chat/user/' . $item['opposite_user_id']) }}'">
                        <div style="display: flex; align-items: center; gap: 15px">
                            <img src="{{ asset('images/conversation.png') }}" alt="Chat Icon">
                            <span>{{ $item['last_message'] }}</span>
                        </div>
                        <h3>{{ $item['last_message_time'] }}</h3>
                    </div>
                </div>
            @endforeach
    </div>
@endsection