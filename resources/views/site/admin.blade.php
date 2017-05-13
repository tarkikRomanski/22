@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="wrapContent row">
            <h1 class="col-12">Aministration</h1>
            <br>
            <br>
            <h2 class="col-12">Types</h2>
            @foreach($types as $type)

                <div class="eventItem">
                    <div class="color" style="background-color: {{ $type->color }}"></div>
                    <p>{{ $type->name }}</p>
                </div>

            @endforeach
            {{ Form::open(['route'=>'admin', 'method'=>'post', 'class'=>'col-12']) }}
            {{ Form::hidden('type', 't') }}
                <div class="form-group">
                    <label for="typeName">New type name</label>
                    {{ Form::text('typeName', old('typeName'), ['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    <label for="typeColor">New type color</label>
                    {{ Form::color('typeColor', old('typeColor'), ['class'=>'form-control']) }}
                </div>
                {{ Form::submit('Add new type', ['class'=>'btn btn-main btn-block']) }}
            {{ Form::close() }}


            <h2 class="col-12 mt-3">Categories</h2>
            @foreach($categories as $item)

                <div class="eventItem">
                    <div class="color" style="background-color: {{ $item->color }}"></div>
                    <p>{{ $item->name }}</p>
                </div>

            @endforeach
            {{ Form::open(['route'=>'admin', 'method'=>'post', 'class'=>'col-12']) }}
            {{ Form::hidden('type', 'c') }}
            <div class="form-group">
                <label for="categoryName">New category name</label>
                {{ Form::text('categoryName', old('categoryName'), ['class'=>'form-control']) }}
            </div>
            <div class="form-group">
                <label for="categoryColor">New category color</label>
                {{ Form::color('categoryColor', old('categoryColor'), ['class'=>'form-control']) }}
            </div>
            {{ Form::submit('Add new type', ['class'=>'btn btn-main btn-block']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection