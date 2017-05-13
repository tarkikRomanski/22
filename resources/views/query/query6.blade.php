@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="wrapContent row">
            <div class="col-12">
                <h1 class="mb-3">Query 6</h1>

                <div class="form-group mb-2">
                    {{ Form::label('team', 'Choise team:') }}
                    <select name="team" id="team" class="form-control">
                        @foreach($teams as $team)
                            <option value="{{$team->id}}">{{$team->name}}</option>
                        @endforeach
                    </select>
                </div>
            <div id="queryTodoListBlock"></div>
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