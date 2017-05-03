<div class="modal-header">
    <h5 class="modal-title">{{ $event->title }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
{{ Form::open(['route'=>'event.edit', 'method'=>'post', 'id'=>'eventAddForm', 'role'=>'form', 'enctype'=>'multipart/form-data']) }}
{{ Form::hidden('event', $event->id) }}
<div class="modal-body">
    <div class="form-group">
        <label for="title" class="form-control-label">Title:</label>
        <input type="text" value="{{ $event->title }}" class="form-control" id="title" name="title">
    </div>
    <div class="form-group">
        <label for="text" class="form-control-label">Text:</label>
        <textarea class="form-control" id="text" name="text">{{ $event->text }}</textarea>
    </div>
    <div class="form-group">
        <label for="type">Event type:</label>
        <select name="type" id="type" class="form-control">
            @foreach($types as $type)
                <option
                        {{ $type->name==$event->type?'selected:"selected"':'' }}
                        style="color:{{ $type->color }}"
                        value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="category">Event category:</label>
        <select name="category" id="category" class="form-control">
            @foreach($category as $item)
                <option
                        {{ $item->name==$event->category?'selected:"selected"':'' }}
                        value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>

    <fieldset>
        <legend>Date start:</legend>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="start_year">Year:</label>
                    <select name="start_year" id="start_year" class="form-control">
                        @for($year = \Carbon\Carbon::today()->year; $year <= 2050; $year++)
                            <option
                                    {{
                                        $year == $event->date_start_year
                                            ?'selected="selected"'
                                            :''
                                    }}
                                    value="{{ $year }}">
                                {{ $year }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="start_month">Month:</label>
                    <select name="start_month" id="start_month" class="form-control">
                        @for($month = 1; $month <= 12; $month++)
                            <option
                                    {{
                                        $month == $event->date_start_month
                                            ?'selected="selected"'
                                            :''
                                    }}
                                    value="{{ $month }}">{{ $month }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="start_day">Day:</label>
                    <select name="start_day" id="start_day" class="form-control">
                        @for($day = 1; $day <= 31; $day++)
                            <option
                                    {{
                                        $day == $event->date_start_day
                                            ?'selected="selected"'
                                            :''
                                    }}
                                    value="{{ $day }}">{{ $day }}</option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>
    </fieldset>

    <fieldset>
        <legend>Time start:</legend>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="start_hour">Hour:</label>
                    <select name="start_hour" id="start_hour" class="form-control">
                        @for($hour = 1; $hour <= 24; $hour++)
                            <option
                                    {{
                                        $hour == $event->time_start_hour
                                            ?'selected="selected"'
                                            :''
                                    }}
                                    value="{{ $hour }}">{{ $hour }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="start_minute">Minute:</label>
                    <select name="start_minute" id="start_minute" class="form-control">
                        @for($minute = 0; $minute <= 60; $minute+=5)
                            <option
                                    {{
                                        $minute == $event->time_start_minute
                                        ?'selected:"selected"'
                                        :''
                                    }}
                                    value="{{ $minute }}">{{ $minute }}</option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>
    </fieldset>



    <fieldset>
        <legend>Date end:</legend>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="end_year">Year:</label>
                    <select name="end_year" id="end_year" class="form-control">
                        @for($year = \Carbon\Carbon::today()->year; $year <= 2050; $year++)
                            <option
                                    {{
                                        $year == $event->date_end_year
                                            ?'selected="selected"'
                                            :''
                                    }}
                                    value="{{ $year }}">
                                {{ $year }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="end_month">Month:</label>
                    <select name="end_month" id="end_month" class="form-control">
                        @for($month = 1; $month <= 12; $month++)
                            <option
                                    {{
                                        $month == $event->date_end_month
                                            ?'selected="selected"'
                                            :''
                                    }}
                                    value="{{ $month }}">{{ $month }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="end_day">Day:</label>
                    <select name="end_day" id="end_day" class="form-control">
                        @for($day = 1; $day <= 31; $day++)
                            <option
                                    {{
                                        $day == $event->date_end_day
                                            ?'selected="selected"'
                                            :''
                                    }}
                                    value="{{ $day }}">{{ $day }}</option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>
    </fieldset>

    <fieldset>
        <legend>Time end:</legend>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="end_hour">Hour:</label>
                    <select name="end_hour" id="end_hour" class="form-control">
                        @for($hour = 1; $hour <= 24; $hour++)
                            <option
                                    {{
                                        $hour == $event->time_end_hour
                                            ?'selected="selected"'
                                            :''
                                    }}
                                    value="{{ $hour }}">{{ $hour }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="end_minute">Minute:</label>
                    <select name="end_minute" id="end_minute" class="form-control">
                        @for($minute = 0; $minute <= 60; $minute+=5)
                            <option
                                    {{
                                        $minute == $event->time_end_minute
                                            ?'selected="selected"'
                                            :''
                                    }}
                                    value="{{ $minute }}">{{ $minute }}</option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>
    </fieldset>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button class="btn btn-main">Add new Event</button>
</div>
{{ Form::close() }}