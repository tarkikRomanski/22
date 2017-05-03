<div class="modal-header">
    <h5 class="modal-title">{{$todo->title}}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
{{ Form::open(['route'=>'todo.edit', 'method'=>'post', 'id'=>'editTodoForm']) }}
<div class="modal-body">
        {{ Form::hidden('id', $todo->id) }}

        <div class="form-group">
            <label for="title">Title</label>
            {{ Form::text('title', $todo->title, ['class'=>'form-control']) }}
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            {{ Form::textarea('description', $todo->description, ['class'=>'form-control']) }}
        </div>

        <div class="form-control">
            <div class="form-check">
                <label for="ttomorrow" class="form-check-label">
                    <input type="checkbox" name="ttomorrow" id="ttomorrow" class="form-check-input">
                    Transfer tomorrow
                </label>
            </div>
        </div>

        @if(\Carbon\Carbon::createFromDate($todo->date_year, $todo->date_month, $todo->date_day)->toDateString()
                != \Carbon\Carbon::today()->toDateString())
            <span class="text-danger">
                    U delayed execution!!!
                </span>
        @endif
        <small class="float-right">
            {{\Carbon\Carbon::createFromDate($todo->date_year, $todo->date_month, $todo->date_day)->toDateString()}}
        </small>
    </p>
</div>
<div class="modal-footer">
    <button class="btn btn-main">Edit</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
{{ Form::close() }}