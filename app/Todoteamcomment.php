<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todoteamcomment extends Model
{
    public $timestamps = false;
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

    public static function getCommentForTeam($id){
        return Todoteamcomment::where('todoteamcomments.target_id', $id)
            ->join('users as owner', 'owner.id', '=', 'todoteamcomments.owner_id')
            ->select(
                'todoteamcomments.text as text',
                'todoteamcomments.date_year as year',
                'todoteamcomments.date_month as month',
                'todoteamcomments.date_day as day',
                'owner.name as owner_name',
                'owner.id as owner_id'
            );
}
}
