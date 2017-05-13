<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Todo;

use Auth;

class TodoController extends Controller
{
    public function add(Request $request){
        if ($request->isMethod('post')){

            $input = $request->all();
            $date = Carbon::parse($input['when']);
            Todo::create([
                'title' => $input['title'],
                'description' => $input['description']!=''?$input['description']:null,
                'owner_id' => Auth::user()->id,
                'status' => false,
                'date_year' => $date->year,
                'date_month' => $date->month,
                'date_day' => $date->day,
            ]);

            return back();
        }
    }

    public function setList($where = null){
        $where = $where==null?'today':$where;

        $date = Carbon::parse($where);

        if(!Todo::todayList($date)->exists()) {
            $data = [
                'messeage' => 'U 2Do list EMPTY, create first task!<span class="emoji"></span>'
            ];
        }
            $data['todos'] = Todo::todayList($date)->get();
            $data['where'] = $where;

            echo view('site.todo.list', $data);
    }

    public function setFromId($id = null){
        if($id != null){
            if(Todo::where('id', $id)->exists()) {

                $todo = Todo::find($id);

                if($todo->owner_id == Auth::user()->id)
                    echo view('site.todo.set', ['todo' => $todo]);
                else
                    echo '<h2>You dont have promise!</h2>';
            } else {
                echo '<h2>Data does not exist</h2>';
            }
        }
    }

    public function status($id){
        if($id != null){
            $todo = Todo::where('id', $id)->first();
            if($todo->owner_id == Auth::user()->id)
                Todo::where('id', $id)->update([
                    'status'=> $todo->status==0?1:0
                ]);
        }
    }

    public function delete($id){
        if($id != null){
            $todo = Todo::where('id', $id)->first();
            if($todo->owner_id == Auth::user()->id)
                Todo::where('id', $id)->delete();
        }
    }

    public function editFromId(Request $request, $id = null){
        if($request->isMethod('post')){
            $input = $request->all();

            $update = [
                'title' => $input['title'],
                'description' => $input['description']
            ];

            if (isset($input['ttomorrow'])) {
                $date = Carbon::parse('tomorrow');
                $update['date_year'] = $date->year;
                $update['date_month'] = $date->month;
                $update['date_day'] = $date->day;
            }

            Todo::where('id', $input['id'])
                ->update($update);

            return back();
        }

        if($id != null){
            if(Todo::where('id', $id)->exists()) {

                $todo = Todo::find($id);

                if($todo->owner_id == Auth::user()->id)
                    echo view('site.todo.edit', ['todo' => $todo]);
                else
                    echo '<h2>You dont have promise!</h2>';
            } else {
                echo '<h2>Data does not exist</h2>';
            }
        }
    }
}
