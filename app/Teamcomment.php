<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teamcomment extends Model
{
    protected $table = 'teamcomments';
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
