<div class="modal-header">
    <h5 class="modal-title">{{$todo->title}}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <p>{{ $todo->description }}</p>
    <p>Status: <strong class="{{ $todo->status==0?'text-warning':'text-success' }}">{{ $todo->status==0?'Not done':'Done' }}</strong></p>
   <p>
       <small>
           Creator:
           @if($todo->creator_id == Auth::user()->id)
               <strong> U </strong>
           @else
               <a href="/u/{{$todo->creator_name}}">{{$todo->creator_name}}</a>
           @endif
       </small>
   </p>
    <p>
        <small>
            Member:
            @if($todo->member_id == Auth::user()->id)
                <strong> U </strong>
            @else
                <a href="/u/{{$todo->member_id}}">{{$todo->member_name}}</a>
            @endif
        </small>
    </p>
    <p>
        <small>
            Created date: {{\Carbon\Carbon::createFromDate($todo->date_year, $todo->date_month, $todo->date_day)->toDateString()}}
        </small>
    </p>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>