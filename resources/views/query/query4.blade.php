@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="wrapContent row">
            <div class="col-12">
                <h1 class="mb-3">Query 4</h1>
                {{ Form::open(['route'=>'q4', 'method'=>'post']) }}
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
                @if(isset($t))
                    <table class="table mt-2">
                        <thead>
                        <td>Name</td>
                        <td>Description</td>
                        <td>Color</td>
                        <td>Members count</td>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$t->name}}</td>
                            <td>{{$t->description}}</td>
                            <td style="background: {{$t->color}};"></td>
                            <td>{{$membersCount}}</td>
                        </tr>
                        </tbody>
                    </table>
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