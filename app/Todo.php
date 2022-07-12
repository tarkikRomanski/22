<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
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

    public function scopeAuthUser(Builder $query): Builder {
        return $query->where('owner_id', Auth::user()->id);
    }

    public static function overdueTasksId($date, $id){
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

    public static function overdueTasks($date){
        $notDoneLastYear = Todo::authUser()
            ->where('status', false)
            ->where('date_year', '<', $date->year);

        $notDoneLastMonth = Todo::authUser()
            ->where('status', false)
            ->where('date_year', $date->year)
            ->where('date_month', '<', $date->month);

        return Todo::authUser()
            ->where('status', false)
            ->where('date_year', $date->year)
            ->where('date_month', $date->month)
            ->where('date_day', '<', $date->day)
            ->unionAll($notDoneLastYear)
            ->unionAll($notDoneLastMonth);
    }

    public static function todayListId($date, $id){
        $doesntDoneLastYear = Todo::where('owner_id', $id)
            ->where('status', false)
            ->where('date_year', '<', $date->year);

        $doesntDoneLastMonth = Todo::where('owner_id', $id)
            ->where('status', false)
            ->where('date_year', $date->year)
            ->where('date_month', '<', $date->month);

        $doesntDoneThisMonth = Todo::where('owner_id', $id)
            ->where('status', false)
            ->where('date_year', $date->year)
            ->where('date_month', $date->month)
            ->where('date_day', '<', $date->day);

        return Todo::where('owner_id', $id)
            ->where('date_year', $date->year)
            ->where('date_month', $date->month)
            ->where('date_day', $date->day)
            ->unionAll($doesntDoneThisMonth)
            ->unionAll($doesntDoneLastMonth)
            ->unionAll($doesntDoneLastYear);
    }

    public function getTodayList(Carbon $date): Builder {
        return Todo::authUser()
            ->where('date_year', $date->year)
            ->where('date_month', $date->month)
            ->where('date_day', $date->day)
            ->unionAll(
                $this->getDoesntCompleteTodosQueryByDayInMonth(
                    Todo::authUser(),
                    $date->year,
                    $date->month,
                    $date->day
                )
            )
            ->unionAll($this->getDoesntCompleteTodosQueryByMonth(Todo::authUser(), $date->year, $date->month))
            ->unionAll($this->getDoesntCompleteTodosQueryByYear(Todo::authUser(), $date->year));
    }

    private function getDoesntCompleteTodosQueryByYear(Builder $preQuery, int $year): Builder {
        return $preQuery
            ->where('status', false)
            ->where('date_year', '<', $year);
    }

    private function getDoesntCompleteTodosQueryByMonth(Builder $preQuery, int $year, int $month): Builder {
        return $preQuery
            ->where('status', false)
            ->where('date_year', $year)
            ->where('date_month', '<', $month);
    }

    private function getDoesntCompleteTodosQueryByDayInMonth(
        Builder $preQuery,
        int $year,
        int $month,
        int $day
    ): Builder {
        return $preQuery
            ->where('status', false)
            ->where('date_year', $year)
            ->where('date_month', $month)
            ->where('date_day', '<', $day);
    }
}
