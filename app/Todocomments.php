<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todocomments extends Model
{
    protected $table = 'todocomments';
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
