<div class="modal-header">
    <h5 class="modal-title">{{$event->title}}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <h1>{{ $event->title }}</h1>
    @if($event->image != null)
        <center>{{ Html::image('/img/'.$event->image, 'logo') }}</center>
    @endif
    <p>{{ $event->text }}</p>
    <p>Status:
        <strong
                class="{{ $event->status==0?'text-warning':'text-success' }}">
            {{ $event->status==0?'Not done':'Done' }}
        </strong>
    </p>
    <p>
        @if(\Carbon\Carbon::createFromDate(
        $event->date_end_year,
        $event->date_end_month,
        $event->date_end_day,
        $event->date_end_hour,
        $event->date_end_minute
        )
                ->toDateTimeString()
                != \Carbon\Carbon::today()->toDateTimeString())
            <span class="text-danger">
                    U delayed execution!!!
                </span>
        @endif

    </p>
    <p>
        Type:
        <small style="color:{{$event->type_color}}">
            {{ $event->type }}
        </small>
    </p>
    <p>
        Category:
        <small style="color:{{$event->category_color}}">
            {{ $event->category }}
        </small>
    </p>
    <p>
        Begining:
        <small>
            {{\Carbon\Carbon::createFromDate($event->date_start_year,
            $event->date_start_month,
            $event->date_start_day,
            $event->date_start_hour,
            $event->date_start_minute
            )->toDateTimeString()}}
        </small>
    </p>
    <p>
        Due date:
        <small>
            {{\Carbon\Carbon::createFromDate($event->date_end_year,
            $event->date_end_month,
            $event->date_end_day,
            $event->date_end_hour,
            $event->date_end_minute
            )->toDateTimeString()}}
        </small>
    </p>
</div>
<div class="modal-footer">
    <button id="editButton" class="btn btn-default icon-edit">Edit</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>