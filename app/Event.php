<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Auth;
class Event extends Model
{
    public $timestamps = false;
    protected $table = 'events';
    protected $fillable = [
        'id',
        'category_id',
        'type_id',
        'owner_id',
        'image',
        'title',
        'text',
        'date_start_year',
        'date_start_month',
        'date_start_day',
        'time_start_hours',
        'time_start_minutes',
        'date_end_year',
        'date_end_month',
        'date_end_day',
        'time_end_hours',
        'time_end_minutes',
        'status'
    ];

    public static function createNewEvent($data, $dateStart, $dateEnd){
        Event::create([
           'category_id'=>$data['category'],
            'type_id'=>$data['type'],
            'owner_id'=>$data['owner'],
            'image'=>isset($data['image'])?$data['image']:null,
            'title'=>$data['title'],
            'text'=>$data['text'],
            'date_start_year'=>$dateStart->year,
            'date_start_month'=>$dateStart->month,
            'date_start_day'=>$dateStart->day,
            'time_start_hours'=>$dateStart->hour,
            'time_start_minutes'=>$dateStart->minute,
            'date_end_year'=>$dateEnd->year,
            'date_end_month'=>$dateEnd->month,
            'date_end_day'=>$dateEnd->day,
            'time_end_hours'=>$dateEnd->hour,
            'time_end_minutes'=>$dateEnd->minute,
            'status'=>false
        ]);
    }
    public static function updateEvent($data, $dateStart, $dateEnd, $id){
        Event::where('id', $id)
            ->update([
                'category_id'=>$data['category'],
                'type_id'=>$data['type'],
                'owner_id'=>$data['owner'],
                'image'=>isset($data['image'])?$data['image']:null,
                'title'=>$data['title'],
                'text'=>$data['text'],
                'date_start_year'=>$dateStart->year,
                'date_start_month'=>$dateStart->month,
                'date_start_day'=>$dateStart->day,
                'time_start_hours'=>$dateStart->hour,
                'time_start_minutes'=>$dateStart->minute,
                'date_end_year'=>$dateEnd->year,
                'date_end_month'=>$dateEnd->month,
                'date_end_day'=>$dateEnd->day,
                'time_end_hours'=>$dateEnd->hour,
                'time_end_minutes'=>$dateEnd->minute,
                'status'=>false
            ]);
    }

    public static function getUserEvents($status){
        return Event::where('events.owner_id', Auth::user()->id)
            ->where('events.status', $status)
            ->join('types', 'events.type_id', '=', 'types.id')
            ->join('categorys', 'events.category_id', '=', 'categorys.id')
            ->select(
                'events.id',
                'categorys.name as category',
                'categorys.color as category_color',
                'types.name as type',
                'types.color as type_color',
                'events.image',
                'events.title',
                'events.text',
                'events.date_start_year',
                'events.date_start_month',
                'events.date_start_day',
                'events.time_start_hours',
                'events.time_start_minutes',
                'events.date_end_year',
                'events.date_end_month',
                'events.date_end_day',
                'events.time_end_hours',
                'events.time_end_minutes',
                'events.status'
            );
    }

    public static function getForUserEvents($status, $id){
        return Event::where('events.owner_id', $id)
            ->where('events.status', $status)
            ->join('types', 'events.type_id', '=', 'types.id')
            ->join('categorys', 'events.category_id', '=', 'categorys.id')
            ->select(
                'events.id',
                'categorys.name as category',
                'categorys.color as category_color',
                'types.name as type',
                'types.color as type_color',
                'events.image',
                'events.title',
                'events.text',
                'events.date_start_year',
                'events.date_start_month',
                'events.date_start_day',
                'events.time_start_hours',
                'events.time_start_minutes',
                'events.date_end_year',
                'events.date_end_month',
                'events.date_end_day',
                'events.time_end_hours',
                'events.time_end_minutes',
                'events.status'
            );
    }

    public static function getUserEvent($id){
        return Event::where('events.id', $id)
            ->join('types', 'events.type_id', '=', 'types.id')
            ->join('categorys', 'events.category_id', '=', 'categorys.id')
            ->select(
                'events.id',
                'categorys.name as category',
                'categorys.color as category_color',
                'types.name as type',
                'types.color as type_color',
                'events.owner_id',
                'events.image',
                'events.title',
                'events.text',
                'events.date_start_year',
                'events.date_start_month',
                'events.date_start_day',
                'events.time_start_hours',
                'events.time_start_minutes',
                'events.date_end_year',
                'events.date_end_month',
                'events.date_end_day',
                'events.time_end_hours',
                'events.time_end_minutes',
                'events.status'
            );
    }


}
