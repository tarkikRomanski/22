@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="wrapContent row">
            <div class="col-12">
                <h1 class="mb-3">Query 8</h1>
                {{ Form::open(['route'=>'q8', 'method'=>'post']) }}
                <div class="form-group mb-2">
                    {{ Form::label('user', 'Choise user:') }}
                    <select name="user" id="user" class="form-control">
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>

                <fieldset class="form-group">
                    <legend>Select status</legend>
                    <div class="form-check">
                        <label for="d" class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" id="d" value="d" checked>
                            Done
                        </label>
                    </div>
                    <div class="form-check">
                        <label for="nd" class="form-check-label">
                            <input type="radio" class="form-check-input" name="status" id="nd" value="nd">
                            Not done
                        </label>
                    </div>
                </fieldset>

                {{ Form::submit('Show result', ['class'=>'btn btn-block btn-main']) }}
                {{ Form::close() }}
                @if(isset($title))
                    <h3>{{$title}}</h3>
                @endif
                @if(isset($events))
                        @foreach($events as $event)
                            <div class="eventItem">
                                <div class="color" style="background-color: {{ $event->category_color }}"></div>
                                <div class="color" style="background-color: {{ $event->type_color }}"></div>
                                <label for="event{{$event->id}}"> <h3>{{ $event->title }}</h3></label>
                                <p><strong>Type:</strong>{{$event->type}}</p>
                                <p><strong>Category:</strong>{{$event->category}}</p>
                                <p><strong>Description:</strong>{{ $event->description }}</p>
                                <p><strong>Image:</strong>
                                    @if($event->image != null)
                                        <center>{{ Html::image('/img/'.$event->image, 'logo') }}</center>
                                    @endif
                                </p>
                            </div>
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