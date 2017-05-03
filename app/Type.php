<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    public $timestamps = false;
    protected $table = 'types';

    protected $fillable = [
        'id',
        'color',
        'name'
    ];
}
