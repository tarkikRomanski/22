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
                <a href="/u/{{$todo->member_name}}">{{$todo->member_name}}</a>
            @endif
        </small>
    </p>
    <p>
        <small>
            Created date: {{\Carbon\Carbon::createFromDate($todo->date_year, $todo->date_month, $todo->date_day)->toDateString()}}
        </small>
    </p>

    <h2>Comments:</h2>

    <div id="commentsBlock">
        @foreach($comments as $item)
            <div class="commentItem">
                <h4>{{ $item->owner_name }}</h4>
                <p>{{ $item->text }}</p>
                <strong>
                    {{ \Carbon\Carbon::create($item->year, $item->month, $item->day)->toDateString() }}
                </strong>
            </div>
        @endforeach
    </div>

    {{ Form::open(['route'=>'comment.add', 'method'=>'post', 'id'=>'newCommentForm']) }}
    {{ Form::hidden('target', $todo->id) }}
    {{ Form::hidden('type', 'todoteam') }}

        <div class="form-group">
            <label for="text">Text:</label>
            <textarea name="text" id="text" class="form-control" rows="10"></textarea>
            <button class="btn btn-main icon-send">Send comment</button>
        </div>

    {{ Form::close() }}
</div>
<div class="modal-footer">
    @if($todo->creator_id == Auth::user()->id)
        <button id="editButton" class="btn btn-default icon-edit">Edit</button>
    @endif
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>