<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Auth;
class Todo extends Model
{
    public $timestamps = false;
    protected $table = "todos";

    protected $fillable = [
        'id',
        'title',
        'status',
        'description',
        'owner_id',
        'date_year' ,
        'date_month' ,
        'date_day'
    ];

    public function scopeGetUserTasc($query){
        return $query->where('owner_id', Auth::user()->id);
    }

    public static function overdayTasksId($date, $id){
        $notDoneLastYear = Todo::where('owner_id', $id)
            ->where('status', false)
            ->where('date_year', '<', $date->year);
        $notDoneLastMonth = Todo::where('owner_id', $id)
            ->where('status', false)
            ->where('date_year', $date->year)
            ->where('date_month', '<', $date->month);
        return Todo::where('owner_id', $id)
            ->where('status', false)
            ->where('date_year', $date->year)
            ->where('date_month', $date->month)
            ->where('date_day', '<', $date->day)
            ->unionAll($notDoneLastYear)
            ->unionAll($notDoneLastMonth);
    }

    public static function overdayTasks($date){
        $notDoneLastYear = Todo::getUserTasc()
            ->where('status', false)
            ->where('date_year', '<', $date->year);
        $notDoneLastMonth = Todo::getUserTasc()
            ->where('status', false)
            ->where('date_year', $date->year)
            ->where('date_month', '<', $date->month);
        return Todo::getUserTasc()
            ->where('status', false)
            ->where('date_year', $date->year)
            ->where('date_month', $date->month)
            ->where('date_day', '<', $date->day)
            ->unionAll($notDoneLastYear)
            ->unionAll($notDoneLastMonth);
    }

    public static function listForDateAndOwner($date, $owner){
        return Todo::where('owner_id', $owner)
            ->where('date_year', $date->year)
            ->where('date_month', $date->month)
            ->where('date_day', $date->day);
    }

    public static function listForBehDateAndStatus($date, $id, $status){
        $notDoneLastYear = Todo::where('owner_id', $id)
            ->where('status', $status)
            ->where('date_year', '<', $date->year);
        $notDoneLastMonth = Todo::where('owner_id', $id)
            ->where('status', $status)
            ->where('date_year', $date->year)
            ->where('date_month', '<', $date->month);
        return Todo::where('owner_id', $id)
            ->where('status', $status)
            ->where('date_year', $date->year)
            ->where('date_month', $date->month)
            ->where('date_day', '<', $date->day)
            ->unionAll($notDoneLastMonth)
            ->unionAll($notDoneLastYear);
    }

    public static function todayListId($date, $id){
        $notDoneLastYear = Todo::where('owner_id', $id)
            ->where('status', false)
            ->where('date_year', '<', $date->year);
        $notDoneLastMonth = Todo::where('owner_id', $id)
            ->where('status', false)
            ->where('date_year', $date->year)
            ->where('date_month', '<', $date->month);
        $notDoneThisMonth = Todo::where('owner_id', $id)
            ->where('status', false)
            ->where('date_year', $date->year)
            ->where('date_month', $date->month)
            ->where('date_day', '<', $date->day);

        return Todo::where('owner_id', $id)
            ->where('date_year', $date->year)
            ->where('date_month', $date->month)
            ->where('date_day', $date->day)
            ->unionAll($notDoneThisMonth)
            ->unionAll($notDoneLastMonth)
            ->unionAll($notDoneLastYear);
    }

    public static function todayList($date){
        $notDoneLastYear = Todo::getUserTasc()
            ->where('status', false)
            ->where('date_year', '<', $date->year);
        $notDoneLastMonth = Todo::getUserTasc()
            ->where('status', false)
            ->where('date_year', $date->year)
            ->where('date_month', '<', $date->month);
        $notDoneThisMonth = Todo::getUserTasc()
            ->where('status', false)
            ->where('date_year', $date->year)
            ->where('date_month', $date->month)
            ->where('date_day', '<', $date->day);

        return Todo::getUserTasc()
            ->where('date_year', $date->year)
            ->where('date_month', $date->month)
            ->where('date_day', $date->day)
            ->unionAll($notDoneThisMonth)
            ->unionAll($notDoneLastMonth)
            ->unionAll($notDoneLastYear);
    }

}
