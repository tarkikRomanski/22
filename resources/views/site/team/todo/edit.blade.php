<div class="modal-header">
    <h5 class="modal-title">{{$todo->title}}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
{{ Form::open(['route'=>'team.todo.edit']) }}
<div class="modal-body">

    <div class="form-group">
        <label for="title" class="form-control-label">Title:</label>
        {{ Form::text('title', $todo->title, ['class'=>'form-control']) }}
    </div>
    <div class="form-group">
        <label for="description" class="form-control-label">Description:</label>
        {{ Form::textarea('description', $todo->description, ['class'=>'form-control']) }}
    </div>
    <div class="form-group">
        <label for="member" class="form-control-label">Member:</label>
        <select name="member" id="member" class="form-control">
            @foreach($select as $member)
                <option {{$member->user_id==$todo->member_id?'selected="selected"':''}} value="{{$member->user_id}}">{{$member->name . ' || ' . $member->email}}</option>
            @endforeach
        </select>
    </div>

    {{ Form::hidden('todo', $todo->id) }}

    <p>
        <small>
            Created date: {{\Carbon\Carbon::createFromDate($todo->date_year, $todo->date_month, $todo->date_day)->toDateString()}}
        </small>
    </p>
</div>
<div class="modal-footer">
    <button class="btn btn-main icon-edit">Edit</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
{{ Form::close() }}