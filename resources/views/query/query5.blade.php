@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="wrapContent row">
            <div class="col-12">
                <h1 class="mb-3">Query 5</h1>
                {{ Form::open(['route'=>'q5', 'method'=>'post']) }}
                <div class="form-group mb-2">
                    {{ Form::label('user', 'Choise user:') }}
                    <select name="user" id="user" class="form-control">
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-2">
                    {{ Form::label('team', 'Choise team:') }}
                    <select name="team" id="team" class="form-control">
                        @foreach($teams as $team)
                            <option value="{{$team->id}}">{{$team->name}}</option>
                        @endforeach
                    </select>
                </div>
                {{ Form::submit('Show result', ['class'=>'btn btn-block btn-main']) }}
                {{ Form::close() }}
                @if(isset($title))
                    <h3>{{$title}}</h3>
                @endif
                @if(isset($members))
                    @foreach($members as $member)
                        <a href="/u/{{$member->name}}">
                            <div class="userItem">
                                <div class="userCharacter" style="background-image: url(/img/{{ $member->image }}.png)"></div>
                                <div class="userData">
                                    @if($member->user_id == $team->id)
                                        <h3>Owner</h3>
                                    @endif
                                    <p>Name: {{ $member->name }}</p>
                                    <p>Email: {{ $member->email }}</p>
                                    {!! $member->status==0?'<p class="text-danger">User not confirmed request</p>':'' !!}
                                </div>
                            </div>
                        </a>
                    @endforeach
                @else
                    @if(isset($message))
                        <div class="alert alert-danger" role="alert">
                            <strong>Oh snap!</strong> {{$message}}
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection