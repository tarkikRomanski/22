@extends('layouts.app')

@section('content')
    <i class="i voice" id="voice"></i>
    <div class="container">
        <div class="row block404">
            <p>404</p>
            <strong>Page not found</strong>
        </div>
    </div>

    <audio id="music" autoplay="autoplay" loop="loop">
        <source src="{{ asset('audio/Martin Shamoonpour - Zarde Malije (Folk Song) [pesnik.su].mp3') }}" type="audio/mpeg">
    </audio>
@endsection
