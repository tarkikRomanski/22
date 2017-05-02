<?php

namespace App\Http\Controllers;

use App\Todosteam;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
class TodosteamController extends Controller
{
    public function add(Request $request){
        if ($request->isMethod('post')){

            $input = $request->all();

            $date = Carbon::parse('today');
            Todosteam::create([
                'title' => $input['title'],
                'description' => $input['description']!=''?$input['description']:null,
                'creator_id' => Auth::user()->id,
                'status' => false,
                'team_id'=>$input['team'],
                'memory_id' => $input['member'],
                'date_year' => $date->year,
                'date_month' => $date->month,
                'date_day' => $date->day,
            ]);

            return back();
        }
    }

    public function getList($team){

        if(!Todosteam::todoList($team)->exists()) {
            $data = [
                'messeage' => 'Team 2Do list EMPTY, create first task!<span class="emoji"></span>'
            ];
        }
        $data['todos'] = Todosteam::todoList($team)->get();

        echo view('site.team.todo.list', $data);
    }

    public function setFromId($id = null){
        if($id != null){
            if(Todosteam::where('id', $id)->exists()) {

                $todo = Todosteam::findById($id);
                echo view('site.team.todo.set', ['todo' => $todo]);

            } else {
                echo '<h2>Data does not exist</h2>';
            }
        }
    }

    public function status($id){
        if($id != null){
            $todo = Todosteam::where('id', $id)->first();
            if($todo->memory_id == Auth::user()->id || $todo->creator_id == Auth::user()->id)
                Todosteam::where('id', $id)->update([
                    'status'=> $todo->status==0?1:0
                ]);
        }
    }

    public function delete($id){
        if($id != null){
            $todo = Todosteam::where('id', $id)->first();
            if($todo->memory_id == Auth::user()->id || $todo->creator_id == Auth::user()->id)
                Todosteam::where('id', $id)->delete();
        }
    }
}
