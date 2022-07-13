@if(isset($message))
    <p>{!!  $message !!}</p>
@endif

<section>
    @foreach($events as $event)
        <div class="eventItem">
            <div class="color" style="background-color: {{ $event->category_color }}"></div>
            <div class="color" style="background-color: {{ $event->type_color }}"></div>
            <input type="checkbox"
                   data-target="{{$event->id}}"
                   name="event{{$event->id}}"
                   {{$event->status==1 ? 'checked="checked"' : ''}}
                   id="event{{$event->id}}"
                   class="checkbox">
            <label for="event{{$event->id}}"> <h3>{{ $event->title }}</h3></label>

            <button class="view-event" data-toggle="modal" data-target="{{$event->id}}"></button>
            <button class="delete-event" data-target="{{$event->id}}"></button>
        </div>
    @endforeach
</section>
