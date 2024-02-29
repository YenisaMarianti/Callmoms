@extends('layouts.layout')

@section('title', 'Callmoms | Private Chat')

@section('content')
    <div class="online-consultation-wrapper">
        <p class="title-each-menu">Forum Diskusi</p>
        <div class="chat-wrapper">
            <div class="message-content" id="chat-discussion">
                {{-- <p>Show the message</p> --}}
            </div>
            <div class="input-message-wrapper">
                @csrf
                <form id="send-message-discussion">
                    <input type="text" name="content" id="input-form-message-discussion" placeholder="Masukkan pesan anda">
                    <button type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script-function')
<script>
    $(function () {

        var userId = '{{ session('users_data')->id ?? null }}';
        var userNama = '{{ session('users_data')->nama ?? null }}';

        var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
            cluster: '{{ env('PUSHER_APP_CLUSTER') }}'
        });

        var channel = pusher.subscribe('my-channel-forum');

        channel.bind('my-event-forum', function(data) {
            displayMessage(data.message);
        });

        $.get('/messages-forum', function(data) {
            data.forEach(function(message) {
                displayMessage(message);
            });
        });

        function displayMessage(message) {
            var backgroundColor = message.from == userId ? '#6BA5C8' : '#FFFFFF';
            var positionChat = message.from == userId ? 'flex-end' : 'flex-start';
            var messageContent = '<p class="box-message ' + '" style="background-color: ' + backgroundColor + '; align-self: ' + positionChat + '; display: flex; flex-direction: column; font-weight: 400; gap: 5px; align-items: ' + positionChat + ' ">' + '<label style="font-weight: 700;">' + message.nama +'</label>' + message.content + '</p>';
            $('#chat-discussion').append(messageContent);
            $('#chat-discussion').scrollTop($('#chat-discussion')[0].scrollHeight);
        }

        $('#send-message-discussion').submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append('_token', $('input[name="_token"]').val());
            formData.append('from', userId);
            formData.append('nama', userNama);
            $.ajax({
                url: '/send-discussion',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    console.log(data);
                    $('#input-form-message-discussion').val('');
                }
            });
        });

    });
</script>
@endsection