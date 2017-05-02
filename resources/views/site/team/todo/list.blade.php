@if(isset($messeage))
    <h3>{!!  $messeage !!}</h3>
@endif
@foreach($todos as $todo)
    <div class="todo-item">
        <input type="checkbox"
               {{
                    ($todo->creator_id==Auth::user()->id || $todo->memory_id==Auth::user()->id)
                    ?''
                    :'disabled="disabled"'
               }}
               data-target="{{$todo->id}}"
               name="todo{{$todo->id}}"
               {{$todo->status==1?'checked="checked"':''}}
               id="todo{{$todo->id}}"
               class="checkbox">
        <label for="todo{{$todo->id}}">{{$todo->title}}</label>
        <button class="view-todo" data-toggle="modal" data-target="{{$todo->id}}"></button>
        @if($todo->creator_id==Auth::user()->id || $todo->memory_id==Auth::user()->id)
            <button class="delete-todo" data-target="{{$todo->id}}"></button>
        @endif
    </div>
@endforeach