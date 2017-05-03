<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todosteam extends Model
{
    public $timestamps = false;
    protected $table = 'todosteam';
    protected $fillable = [
        'id',
        'title',
        'description',
        'status',
        'team_id',
        'creator_id',
        'memory_id',
        'date_day',
        'date_month',
        'date_year'
    ];

public static function todoList($team){
    return Todosteam::where('team_id', $team);
}

public static function findById($id){
    return Todosteam::where('todosteam.id', $id)
        ->join('users as member', 'todosteam.memory_id', '=', 'member.id')
        ->join('users as creator', 'todosteam.creator_id', '=', 'creator.id' )
        ->select(
            'todosteam.id as id',
            'todosteam.team_id as team_id',
            'todosteam.title as title',
            'todosteam.description as description',
            'todosteam.status as status',
            'todosteam.date_year',
            'todosteam.date_month',
            'todosteam.date_day',
            'member.id as member_id',
            'member.name as member_name',
            'creator.id as creator_id',
            'creator.name as creator_name'
        )->first();
}
}
