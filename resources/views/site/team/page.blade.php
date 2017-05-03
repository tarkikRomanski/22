@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="wrapContent wrapTeam row">

            @if(Auth::user()->id == $team->id)
                <div class="col-sm-4 wrapTeamBar">
                    <button id="sendIbviteButton" class="btn btn-block btn-main">Send invite</button>
                    <button id="newTodoButton" class="btn btn-block btn-main">Add new 2Do</button>
                    <h4>Edit team information:</h4>
                    {{ Form::open(['route'=>'team.edit', 'method'=>'post']) }}
                        {{ Form::hidden('team', $team->id) }}
                        <div class="form-group">
                            <label for="teamName">Team name:</label>
                            {{ Form::text('teamName', $team->name, ['class'=>'form-control']) }}
                        </div>
                        <div class="form-group">
                            <label for="teamDescription">Team description:</label>
                            {{ Form::textarea('teamDescription', $team->description, ['class'=>'form-control']) }}
                        </div>
                        <button class="btn btn-block btn-main">Edit</button>
                    {{ Form::close() }}
                </div>
            @endif

            <div class="{{Auth::user()->id == $team->id?'col-sm-8':'col-12'}}">
                <div class="row">
                    <div class="col-12" style="background:{{$team->color}}; height:100px;">
                        <p class="teamName">{{ $team->name }}</p>
                    </div>
                    @if(\App\Member::where('team_id', $team->id)
                        ->where('user_id', Auth::user()->id)
                        ->where('status', false)
                        ->exists())
                        <a
                                href="/team/confirm/{{\App\Member::where('team_id', $team->id)
                                                    ->where('user_id', Auth::user()->id)
                                                    ->where('status', false)
                                                    ->first()
                                                    ->id}}"
                                class="btn btn-block btn-defaul">
                            Confirm Invite
                        </a>
                    @endif
                    <div class="col-12">
                        <h2>Members: </h2>
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

                        <h2>Team 2Do:</h2>
                        @if(\App\Member::where('team_id', $team->id)
                        ->where('user_id', Auth::user()->id)
                        ->where('status', true)
                        ->exists())
                        {{ Form::open(['url'=>'/team/todo/create', 'method'=>'post', 'id'=>'createTeamTodo']) }}
                            <div class="form-group">
                                <label for="title" class="form-control-label">Title:</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="description" class="form-control-label">Description:</label>
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="member" class="form-control-label">Member:</label>
                                <select name="member" id="member" class="form-control">
                                    @foreach($select as $k=>$member)
                                        <option {{$k==0?'selected="selected"':''}} value="{{$member->user_id}}">{{$member->name . ' || ' . $member->email}}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{ Form::hidden('team', $team->id) }}
                        <button class="btn btn-block btn-main">Create 2Do task</button>
                        {{ Form::close() }}
                        <div id="teamTodoListBlock"><div class="loader">Loading...</div></div>
                        @else
                            <p>U do not have permission to view!</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">

            <div class="modal-content">
            </div>
        </div>
    </div>
@endsection