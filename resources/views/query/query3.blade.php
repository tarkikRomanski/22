@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="wrapContent row">
            <div class="col-12">
                <h1 class="mb-3">Query 3</h1>
                {{ Form::open(['route'=>'q3', 'method'=>'post']) }}
                <div class="form-group mb-2">
                    {{ Form::label('user', 'Choise user:') }}
                    <select name="user" id="user" class="form-control">
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                {{ Form::submit('Show result', ['class'=>'btn btn-block btn-main']) }}
                {{ Form::close() }}
                @if(isset($title))
                    <h3>{{$title}}</h3>
                @endif
                @if(isset($u))
                    <table class="table mt-2">
                        <thead>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Sex</td>
                        <td>Image</td>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$u['name']}}</td>
                                <td>{{$u['email']}}</td>
                                <td>{{$u['sex']==0?'Male':'Female'}}</td>
                                <td><img src="/img/{{$u['image']}}.png" alt="character"></td>
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