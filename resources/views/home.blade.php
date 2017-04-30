@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="wrapContent row">
            <div class="col-md-4 col-sm-3">
                <div class="row wrapBar">
                    {{ Html::image('/img/character_'. Auth::user()->image . '.png', Auth::user()->name, ['class'=>'avatar center-block']) }}
                    <div class="col-12">
                        <h3>{{ Auth::user()->name }}</h3>
                        <p>Email: <strong>{{ Auth::user()->email }}</strong></p>
                        <p>Sex: <strong>{{ Auth::user()->sex==0?'Male':'Female' }}</strong></p>
                    </div>
                    <div class="col-12">
                        <h2>2day 2Do list:</h2>
                        <button class="btn btn-block btn-main" id="newTodoButton">Add new 2Do</button>
                        <div class="todo-item">
                            <label>Todo title</label>
                            <button class="view-todo" data-toggle="modal" data-target="1"></button>
                            <button class="delete-todo" data-target="1"></button>
                        </div>
                        <div class="todo-item todo-complate">
                            <label>Todo title</label>
                            <button class="view-todo" data-target="3"></button>
                            <button class="delete-todo" data-target="3"></button>
                        </div>
                        <div class="todo-item todo-complate">
                            <label>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam amet blanditiis debitis dignissimos.</label>
                            <button class="view-todo" data-target="3"></button>
                            <button class="delete-todo" data-target="3"></button>
                        </div>
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
