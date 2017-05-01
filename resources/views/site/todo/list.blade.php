<h2>2day 2Do list:</h2>
<button class="btn btn-block btn-main" id="newTodoButton">Add new 2Do</button>
@if(isset($messeage))
    <h3>{!!  $messeage !!}</h3>
@endif
@foreach($todos as $todo)
    <div class="todo-item
                {{
                    \Carbon\Carbon::createFromDate($todo->date_year, $todo->date_month, $todo->date_day)->toDateString()
                    != \Carbon\Carbon::today()->toDateString()
                    ? 'todo-old'
                    : ''
                }}">
        <input type="checkbox"
               data-target="{{$todo->id}}"
               name="todo{{$todo->id}}"
               {{$todo->status==1?'checked="checked"':''}}
               id="todo{{$todo->id}}"
               class="checkbox">
        <label for="todo{{$todo->id}}">{{$todo->title}}</label>
        <button class="view-todo" data-toggle="modal" data-target="{{$todo->id}}"></button>
        <button class="delete-todo" data-target="{{$todo->id}}"></button>
    </div>
@endforeach