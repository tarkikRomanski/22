@extends('layouts.app')

@section('content')
    <i class="i voice" id="voice"></i>
    <div class="container">
        <div class="row">
            {{ Form::open(['url'=>'/login', 'role'=>'form', 'method'=>'post', 'id'=>'loginFrom', 'class'=>'authForm col-md-6 offset-md-3']) }}
                <div class="authForm_image_block">
                    <img src="/img/giphy10.gif" alt="Hello" class="authForm_image">
                </div>
                <h2>Login</h2>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">U mail</label>
                    <input type="text" id="email" required="required" name="email" class="form-control">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password">U Pass</label>
                    <input type="password" id="password" required="required" class="form-control" name="password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <button class="btn btn-block btn-main">Login</button>

                <a href="{{ url('/register') }}">U don`t have an account?</a>
            {{ Form::close() }}
        </div>
    </div>

    <audio id="music" autoplay="autoplay" loop="loop">
        <source src="{{ asset('audio/Martin Shamoonpour - Zarde Malije (Folk Song) [pesnik.su].mp3') }}" type="audio/mpeg">
    </audio>
@endsection
