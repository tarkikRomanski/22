<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventcomment extends Model
{
    protected $table = 'eventcomments';
    protected $fillable = [
        'id',
        'owner_id',
        'target_id',
        'text',
        'date_year',
        'date_month',
        'date_day'
    ];
}
