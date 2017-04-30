@extends('layouts.app')

@section('content')
    <i class="i voice" id="voice"></i>
    <div class="container">
        <div class="row">
            {{ Form::open(['url'=>'/register', 'method'=>'post', 'role'=>'form', 'class'=>'authForm col-md-6 offset-md-3', 'id'=>'registerForm']) }}
            <div class="authForm_image_block">
                <img src="/img/giphy10.gif" alt="Hello" class="authForm_image">
            </div>
            <h2>Registration</h2>

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">Enter U name</label>
                <input type="text" id="name" required="required" name="name" class="form-control">

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">Enter U mail</label>
                <input type="email" id="email" required="required" class="form-control" name="email">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div id="password-block" class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password">Enter U Pass</label>
                <input type="password" id="password" required="required" class="form-control" name="password">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="password-confirm">Confirm U Pass</label>
                <input type="password" id="password-confirm" required="required" class="form-control" name="password_confirmation">
            </div>

            <div class="form-group">
                <legend>Choise U sex</legend>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="sex" id="male" value="male" checked>
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="sex" id="female" value="female">
                        Female
                    </label>
                </div>
            </div>

            <div class="form-group" id="characters">
                <legend>Choise U character</legend>
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
