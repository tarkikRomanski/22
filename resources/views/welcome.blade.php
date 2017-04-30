@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="wrapContent welcomeBlock col-12">
                <img src="/img/giphy3.gif" alt="">
                <h1>Welcome, {{ Auth::user()->name }}!</h1>
                <p>This is U 1st time in 22? Then I have the honor to explain what 22 <span class="emoji"></span></p>
                <p>22 - a gr8 way to organize U time and arrange prrts.</p>
                <p>U can cr8 tasks, goals, lists and so on. U can team up with friends as a team to achieve common goals.
                    Good luck in organizing their time and achieved performance. To start, I recommend a 2do list today, and bring back the point "Allocate my time" <span class="emoji"></span> </p>

                {{ link_to_route('home', 'Become more productive', [], ['class'=>'btn btn-main']) }}

            </div>

        </div>
    </div>
@endsection