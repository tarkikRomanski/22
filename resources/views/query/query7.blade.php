@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="wrapContent row">
            <div class="col-12">
                <h1 class="mb-3">Query 7</h1>
                {{ Form::open(['route'=>'q7', 'method'=>'post']) }}
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
                @if(isset($todos))
                    <table class="table">
                        <thead>
                            <td>Title</td>
                            <td>Description</td>
                            <td>Status</td>
                            <td>Creator</td>
                            <td>Member</td>
                            <td>Date</td>
                        </thead>
                        <tbody>
                            @foreach($todos as $todo)
                                <tr>
                                    <td>{{ $todo->title }}</td>
                                    <td>{{ $todo->description }}</td>
                                    <td>{{ $todo->status==true?'Done':'Not done' }}</td>
                                    <td>{{ $todo->creator }}</td>
                                    <td>{{ $todo->member }}</td>
                                    <td>{{ $todo->day }}-{{ $todo->month }}-{{ $todo->year }}</td>
                                </tr>
                            @endforeach
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