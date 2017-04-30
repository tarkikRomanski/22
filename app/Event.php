<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = [
        'id',
        'category_id',
        'type_id',
        'owner_id',
        'image',
        'title',
        'text',
        'date_start_year',
        'date_start_month',
        'date_start_day',
        'date_end_year',
        'date_end_month',
        'date_end_day',
        'time_end_hours',
        'time_end_minutes',
    ];
}
