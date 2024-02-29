@extends('layouts.layout')

@section('title', 'Callmoms | Private Chat')

@section('content')
    <div class="online-consultation-wrapper">
        <p class="title-each-menu">Konsultasi bersama {{ $doctor->nama }}</p>
        <div class="chat-wrapper">
            <div class="message-content" id="chat">
                {{-- <p>Show the message</p> --}}
            </div>
            <div class="input-message-wrapper">
                @csrf
                <form id="send-message">
                    <input type="text" name="content" id="input-form-message" placeholder="Masukkan pesan anda">
                    <button type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script-function')
<script>
    $(function () {
        var urlParts = window.location.pathname.split('/');
        var recipientId = urlParts[urlParts.length - 1];

        var userId = '{{ session('users_data')->id ?? null }}';

        var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
            cluster: '{{ env('PUSHER_APP_CLUSTER') }}'
        });

        var channel = pusher.subscribe('my-channel-chat');

        channel.bind('my-event-chat', function(data) {
            displayMessage(data.message);
        });

        $.get('/messages/' + recipientId, function(data) {
            data.forEach(function(message) {
                displayMessage(message);
            });
        });

        function displayMessage(message) {
            var backgroundColor = message.from == userId ? '#6BA5C8' : '#FFFFFF';
            var positionChat = message.from == userId ? 'flex-end' : 'flex-start';
            var messageContent = '<p class="box-message ' + '" style="background-color: ' + backgroundColor + '; align-self: ' + positionChat + ';">' + message.content + '</p>';
            $('#chat').append(messageContent);
            $('#chat').scrollTop($('#chat')[0].scrollHeight);
        }

        $('#send-message').submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append('_token', $('input[name="_token"]').val());
            formData.append('to', recipientId);
            $.ajax({
                url: '/send',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    // console.log(data);
                    $('#input-form-message').val('');
                }
            });
        });

    });
</script>
@endsection