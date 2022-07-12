<?php

namespace App\Http\Controllers;

use App\Member;
use App\Todosteam;
use App\Todoteamcomment;
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
                'message' => 'Team 2Do list EMPTY, create first task!<span class="emoji"></span>'
            ];
        }
        $data['todos'] = Todosteam::todoList($team)->get();

        echo view('site.team.todo.list', $data);
    }

    public function setFromId($id = null){
        if($id != null){
            if(Todosteam::where('id', $id)->exists()) {

                $todo = Todosteam::findById($id);
                $comments = Todoteamcomment::getCommentForTeam($id)->get();
                echo view('site.team.todo.set', ['todo' => $todo, 'comments'=>$comments]);

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

    public function editFromId(Request $request, $id=null){
        if($request->isMethod('post')){

            $input = $request->all();

            Todosteam::where('id', $input['todo'])
                ->update([
                   'title'=>$input['title'],
                    'description'=>$input['description'],
                    'memory_id'=>$input['member']
                ]);

            return back();
        }

        $todo = Todosteam::findById($id);
        $data = [
            'todo'=> $todo,
            'select' => Member::getOnlyConfirmMembersList($todo->team_id)
        ];


        echo view('site.team.todo.edit', $data);
    }
}
