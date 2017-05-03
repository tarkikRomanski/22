<div class="modal-header">
    <h5 class="modal-title">Adding new Event</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
{{ Form::open(['route'=>'event.add', 'method'=>'post', 'id'=>'eventAddForm', 'role'=>'form', 'enctype'=>'multipart/form-data']) }}
<div class="modal-body">
    <div class="form-group">
        <label for="title" class="form-control-label">Title:</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="form-group">
        <label for="text" class="form-control-label">Text:</label>
        <textarea class="form-control" id="text" name="text"></textarea>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        {{ Form::file('image', old('image'), ['class'=>'form-control']) }}
    </div>
    <div class="form-group">
        <label for="type">Event type:</label>
        <select name="type" id="type" class="form-control">
            @foreach($types as $type)
                <option style="color:{{ $type->color }}" value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="category">Event category:</label>
        <select name="category" id="category" class="form-control">
            @foreach($category as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>\
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
                                        $year == \Carbon\Carbon::parse('today')->year
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
                                        $month == \Carbon\Carbon::now()->month
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
                                        $day == \Carbon\Carbon::now()->day
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
                                        $hour == \Carbon\Carbon::now()->hour
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
                            <option value="{{ $minute }}">{{ $minute }}</option>
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
                                        $year == \Carbon\Carbon::parse('today')->year
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
                                        $month == \Carbon\Carbon::parse('today')->month
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
                                        $day == \Carbon\Carbon::parse('today')->day
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
                                        $hour == \Carbon\Carbon::now()->hour
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
                            <option value="{{ $minute }}">{{ $minute }}</option>
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