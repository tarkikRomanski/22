@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="wrapContent row">
            <div class="col-12">
                <h1 class="mb-3">Query 1</h1>
                {{ Form::open(['route'=>'q1', 'method'=>'post']) }}
                    <div class="form-group mb-2">
                        {{ Form::label('user', 'Choise user:') }}
                        <select name="user" id="user" class="form-control">
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <fieldset>
                    <legend>Choise date:</legend>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="year">Year:</label>
                                <select name="year" id="year" class="form-control">
                                    @for($year = 2000; $year <= 2050; $year++)
                                        <option
                                                {{
                                                    $year == \Carbon\Carbon::parse('today')->year
                                                        ?'selected="selected"'
                                                        :''
                                                }}
                                                value="{{ $year }}">
                                            {{ $year }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="month">Month:</label>
                                <select name="month" id="month" class="form-control">
                                    @for($month = 1; $month <= 12; $month++)
                                        <option
                                                {{
                                                    $month == \Carbon\Carbon::now()->month
                                                        ?'selected="selected"'
                                                        :''
                                                }}
                                                value="{{ $month }}">{{ $month }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="day">Day:</label>
                                <select name="day" id="day" class="form-control">
                                    @for($day = 1; $day <= 31; $day++)
                                        <option
                                                {{
                                                    $day == \Carbon\Carbon::now()->day
                                                        ?'selected="selected"'
                                                        :''
                                                }}
                                                value="{{ $day }}">{{ $day }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </fieldset>

                {{ Form::submit('Show result', ['class'=>'btn btn-block btn-main']) }}
                {{ Form::close() }}
                @if(isset($title))
                    <h3>{{$title}}</h3>
                @endif
                @if(isset($todos))
                    <table class="table mt-2">
                        <thead>
                            <td>Title</td>
                            <td>Description</td>
                            <td>Status</td>
                            <td>Complate date</td>
                        </thead>
                        <tbody>
                            @foreach($todos as $todo)
                                <tr>
                                    <td>{{$todo->title}}</td>
                                    <td>{{$todo->description}}</td>
                                    <td>{{$todo->status==true?'Done':'Not done'}}</td>
                                    <td>{{$todo->date_day}}-{{$todo->date_month}}-{{$todo->date_year}}</td>
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