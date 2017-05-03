<?php

namespace App\Http\Controllers;

use App\Category;
use App\Event;
use App\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
class EventController extends Controller
{
    //
    public function add(Request $request){
        if($request->isMethod('post')){
            $input = $request->all();
            $dateStart = Carbon::create(
                $input['start_year'],
                $input['start_month'],
                $input['start_day'],
                $input['start_hour'],
                $input['start_minute']
                );
            $dateEnd = Carbon::create(
                $input['end_year'],
                $input['end_month'],
                $input['end_day'],
                $input['end_hour'],
                $input['end_minute']
            );
            $data = [
                'category'=>$input['category'],
                'type'=>$input['type'],
                'owner'=>Auth::user()->id,
                'title'=>$input['title'],
                'text'=>$input['text']
            ];

            if($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = $file->getClientOriginalName();
                $file->move(public_path() . '/img', $fileName);
                $data['image'] = $fileName;
            }

            Event::createNewEvent($data, $dateStart, $dateEnd);

            return back();
        }

        $data = [
            'types' => Type::all(),
            'category' => Category::all()
        ];

        echo view('site.event.add', $data);
    }

    public  function userEvents(){
        return view('site.event.list', ['events'=>Event::getUserEvents(false)->get()]);
    }

    public  function userComplatedEvents(){
        return view('site.event.list', ['events'=>Event::getUserEvents(true)->get()]);
    }


    public function status($id){
        if($id != null){
            $todo = Event::where('id', $id)->first();
            if($todo->owner_id == Auth::user()->id)
                Event::where('id', $id)->update([
                    'status'=> $todo->status==0?1:0
                ]);
        }
    }

    public function delete($id){
        if($id != null){
            $todo = Event::where('id', $id)->first();
            if($todo->owner_id == Auth::user()->id)
                Event::where('id', $id)->delete();
        }
    }

    public function eventById($id = null){
        if($id != null){
            if(Event::where('id', $id)->exists()) {

                $event = Event::getUserEvent($id)->first();

                if($event->owner_id == Auth::user()->id)
                    echo view('site.event.set', ['event' => $event]);
                else
                    echo '<h2>You dont have promise!</h2>';
            } else {
                echo '<h2>Data does not exist</h2>';
            }
        }
    }

    public function editFromId(Request $request, $id = null){
        if($request->isMethod('post')){
            $input = $request->all();
            $dateStart = Carbon::create(
                $input['start_year'],
                $input['start_month'],
                $input['start_day'],
                $input['start_hour'],
                $input['start_minute']
            );
            $dateEnd = Carbon::create(
                $input['end_year'],
                $input['end_month'],
                $input['end_day'],
                $input['end_hour'],
                $input['end_minute']
            );
            $data = [
                'category'=>$input['category'],
                'type'=>$input['type'],
                'owner'=>Auth::user()->id,
                'title'=>$input['title'],
                'text'=>$input['text']
            ];
            Event::updateEvent($data, $dateStart, $dateEnd, $input['event']);

            return back();
        }

        if($id != null){
            if(Event::getUserEvent($id)->exists()) {

                $event = Event::getUserEvent($id)->first();

                if($event->owner_id == Auth::user()->id) {
                    $data = [
                        'types' => Type::all(),
                        'category' => Category::all(),
                        'event' => $event
                    ];
                    echo view('site.event.edit', $data);
                }
                else
                    echo '<h2>You dont have promise!</h2>';
            } else {
                echo '<h2>Data does not exist</h2>';
            }
        }
    }
}
