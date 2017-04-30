@extends('layouts.app')

@section('content')
    <i class="i voice" id="voice"></i>
    <div class="container">
        <div class="row">
            <form id="loginForm" class="authForm col-md-6 offset-md-3">
                <div class="authForm_image_block">
                    <img src="/img/giphy10.gif" alt="Hello" class="authForm_image">
                </div>
                <h2>Login</h2>
                <div class="form-group">
                    <label for="userName">U name</label>
                    <input type="text" id="userName" required="required" name="userName" class="form-control">
                </div>

                <div class="form-group">
                    <label for="userPassword">U Pass</label>
                    <input type="password" id="userPassword" required="required" class="form-control" name="userPassword">
                </div>

                <button class="btn btn-block btn-main">Login</button>

                <a href="{{ url('/register') }}">U don`t have an account?</a>
            </form>
        </div>
    </div>

    <audio id="music" autoplay="autoplay" loop="loop">
        <source src="{{ asset('audio/Martin Shamoonpour - Zarde Malije (Folk Song) [pesnik.su].mp3') }}" type="audio/mpeg">
    </audio>
@endsection
