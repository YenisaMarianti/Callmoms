@extends('layouts.layout')

@section('title', 'Callmoms | Tes Kondisi Perasaan')

@section('content')
    <div class="online-consultation-wrapper">
        <p class="title-each-menu">Apa yang sedang ibu rasakan ?</p>
        <div class="emotional-condition-wrapper">
            <h4>Emosi Positif</h4>
            <div class="positive-wrapper">
                <span onclick="toggleEmotion(this)">Senang</span>
                <span onclick="toggleEmotion(this)">Gembira</span>
                <span onclick="toggleEmotion(this)">Bangga</span>
                <span onclick="toggleEmotion(this)">Hangat</span>
                <span onclick="toggleEmotion(this)">Semangat</span>
                <span onclick="toggleEmotion(this)">Lega</span>
                <span onclick="toggleEmotion(this)">Antusias</span>
                <span onclick="toggleEmotion(this)">Ceria</span>
                <span onclick="toggleEmotion(this)">Berharga</span>
                <span onclick="toggleEmotion(this)">Tenang</span>
                <span onclick="toggleEmotion(this)">Harmonis</span>
                <span onclick="toggleEmotion(this)">Puas</span>
                <span onclick="toggleEmotion(this)">Santai</span>
            </div>
            <h4>Emosi Negatif</h4>
            <div class="negative-wrapper">
                <span onclick="toggleEmotion(this)">Gelisah</span>
                <span onclick="toggleEmotion(this)">Sedih</span>
                <span onclick="toggleEmotion(this)">Murung</span>
                <span onclick="toggleEmotion(this)">Kecewa</span>
                <span onclick="toggleEmotion(this)">Berduka</span>
                <span onclick="toggleEmotion(this)">Panik</span>
                <span onclick="toggleEmotion(this)">Marah</span>
                <span onclick="toggleEmotion(this)">Takut</span>
                <span onclick="toggleEmotion(this)">Stree</span>
                <span onclick="toggleEmotion(this)">Cemas</span>
                <span onclick="toggleEmotion(this)">Waspada</span>
                <span onclick="toggleEmotion(this)">Kesal</span>
                <span onclick="toggleEmotion(this)">Apatis</span>
                <span onclick="toggleEmotion(this)">Kesepian</span>
                <span onclick="toggleEmotion(this)">Bosan</span>
                <span onclick="toggleEmotion(this)">Terganggu</span>
                <span onclick="toggleEmotion(this)">Lelah</span>
                <span onclick="toggleEmotion(this)">Jenuh</span>
                <span onclick="toggleEmotion(this)">Malu</span>
                <span onclick="toggleEmotion(this)">Bingung</span>
            </div>

            <div class="btn-submit-emotion">
                <button onclick="checkEmotions()">Submit</button>
            </div>
        </div>
    </div>
@endsection

@section('script-function')
<script>
    var positiveEmotions = [];
    var negativeEmotions = [];

    function toggleEmotion(span) {
        if (span.style.backgroundColor === '#486E86') {
            span.style.backgroundColor = '';
            if (span.parentElement.classList.contains('positive-wrapper')) {
                var index = positiveEmotions.indexOf(span.innerText);
                if (index > -1) {
                    positiveEmotions.splice(index, 1);
                }
            } else if (span.parentElement.classList.contains('negative-wrapper')) {
                var index = negativeEmotions.indexOf(span.innerText);
                if (index > -1) {
                    negativeEmotions.splice(index, 1);
                }
            }
        } else {
            span.style.backgroundColor = '#486E86';
            if (span.parentElement.classList.contains('positive-wrapper')) {
                positiveEmotions.push(span.innerText);
            } else if (span.parentElement.classList.contains('negative-wrapper')) {
                negativeEmotions.push(span.innerText);
            }
        }
    }

    function checkEmotions() {
        if (positiveEmotions.length > negativeEmotions.length) {
            swal({
                title: "Halo Moms :)",
                text: "Sejauh ini anda memiliki perasaan positif yang cukup baik Kami menyarankan Moms untuk masuk ke menu kami meditasi",
                button: "Baik Dok",
                iconHtml: '<img src="/images/smile.png" style="width: 50px; height: 50px;">'
            }).then((value) => {
                if (value) {
                    window.location.href = "{{ url('/meditation') }}";
                }
            });
        } else {
            swal({
                title: "Halo Moms :(",
                text: "Sepertinya emosi negatif Moms saat ini perlu kami perhatikan Moms dapat berkonsultasi dengan dokter secara langsung untuk mendapatkan perhatian khusus",
                button: "Baik Dok",
                iconHtml: '<img src="/images/sad.png" style="width: 50px; height: 50px;">'
            }).then((value) => {
                if (value) {
                    window.location.href = "{{ url('/online-consultation') }}";
                }
            });
        }
    }
</script>
@endsection