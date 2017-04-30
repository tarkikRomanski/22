@extends('layouts.app')

@section('content')
    <i class="i voice" id="voice"></i>
    <div class="container">
        <div class="row">
            {{ Form::open(['url'=>'/register', 'method'=>'post', 'class'=>'authForm col-md-6 offset-md-3', 'id'=>'registerForm']) }}
            <div class="authForm_image_block">
                <img src="/img/giphy10.gif" alt="Hello" class="authForm_image">
            </div>
            <h2>Registration</h2>
            <div class="form-group">
                <label for="name">Enter U name</label>
                <input type="text" id="name" required="required" name="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Enter U mail</label>
                <input type="email" id="email" required="required" class="form-control" name="email">
            </div>

            <div class="form-group">
                <label for="password">Enter U Pass</label>
                <input type="password" id="password" required="required" class="form-control" name="password">
            </div>

            <div class="form-group">
                <label for="confirmPassword">Confirm U Pass</label>
                <input type="password" id="confirmPassword" required="required" class="form-control" name="confirmPassword">
            </div>

            <button class="btn btn-block btn-main">Register</button>

            <a href="{{ url('/login') }}">Do U already have an account?</a>

            {{ Form::close() }}
        </div>
    </div>

    <audio id="music" autoplay="autoplay" loop="loop">
        <source src="{{ asset('audio/Martin Shamoonpour - Zarde Malije (Folk Song) [pesnik.su].mp3') }}" type="audio/mpeg">
    </audio>
@endsection
