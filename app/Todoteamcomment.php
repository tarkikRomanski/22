<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todoteamcomment extends Model
{
    protected $table = 'todoteamcomments';
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
