@extends('layouts.app')

@section('content')
<div id="query" class="container wrapContent">
    <div class="form-group">
        {{ Form::label('team', 'Team:') }}
        <select name="team" id="team" class="form-control">
            @foreach($teams as $team)
                <option value="{{$team->id}}">{{$team->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        {{ Form::label('users', 'User:') }}
        <select name="users" id="users" class="form-control"></select>
    </div>

    <div class="row">
        <div class="col-6">
            <button type="button" id="done" class="btn btn-block btn-main">Done</button>
        </div>
        <div class="col-6">
            <button type="button" id="ndone" class="btn btn-block btn-main">Not done</button>
        </div>
    </div>

    <div id="todolist"></div>
</div>

<div id="modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
        </div>
    </div>
</div>
@endsection