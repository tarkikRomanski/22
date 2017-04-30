<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
    protected $table = 'api';
    protected $fillable = [
        'id',
        'owner_id',
        'key'
    ];
}
