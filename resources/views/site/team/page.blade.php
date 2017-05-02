@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="wrapContent wrapTeam row">

            @if(Auth::user()->id == $team->id)
                <div class="col-sm-4 wrapTeamBar">
                    <button id="sendIbviteButton" class="btn btn-block btn-main">Send invite</button>
                    <button id="newTodoButton" class="btn btn-block btn-main">Add new 2Do</button>
                </div>
            @endif
            <div class="{{Auth::user()->id == $team->id?'col-sm-8':'col-12'}}">
                <div class="row">
                    <div class="col-12" style="background:{{$team->color}}; height:100px;">
                        <p class="teamName">{{ $team->name }}</p>
                    </div>
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