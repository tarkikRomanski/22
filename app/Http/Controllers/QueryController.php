<?php

namespace App\Http\Controllers;

use App\Event;
use App\Member;
use App\Team;
use App\Todo;
use App\Todosteam;
use App\Todoteamcomment;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function firstQ(Request $request){
        $data = [
            'users'=>User::select('id', 'name')->get()
        ];

        if($request->isMethod('post')){
            $input = $request->all();
            $date = Carbon::create($input['year'], $input['month'], $input['day']);
            $todos = Todo::listForDateAndOwner($date, $input['user']);
            $owner = User::where('id', $input['user'])->select('name')->get()->toArray()[0]['name'];
            $data['title'] = 'Show all tasks ' . $owner . ' for ' . $date->toDateString();
            if(!$todos->exists())
                $data['message'] = "Item don`t exists)";
            else
                $data['todos'] = $todos->get();

        }

        return view('query.query1', $data);
    }

    public function secondQ(Request $request){
        $data = [
            'users'=>User::select('id', 'name')->get()
        ];

        if($request->isMethod('post')){
            $input = $request->all();
            $date = Carbon::create($input['year'], $input['month'], $input['day']);
            $status = $input['status']=='d'?true:false;
            $todos = Todo::listForBehDateAndStatus($date, $input['user'], $status);
            $owner = User::where('id', $input['user'])->select('name')->first()->name;
            $data['title'] = 'Show all tasks ' . $owner . ' for ' . $date->toDateString() . ' where status ' . ($status?'Done':'Not done');
            if(!$todos->exists())
                $data['message'] = "Item don`t exists)";
            else
                $data['todos'] = $todos->get();

        }

        return view('query.query2', $data);
    }

    public function threeQ(Request $request){
        $data = [
            'users'=>User::select('id', 'name')->get()
        ];

        if ($request->isMethod('post')){
            $input = $request->all();
            $user = User::where('id', $input['user'])->select('email', 'name', 'sex', 'image')->first()->toArray();
            $data['u'] = $user;
            $data['title'] = 'Show all information from ' . $user['name'];
        }

        return view('query.query3', $data);
    }



    public function fourdQ(Request $request){
        $data = [
            'users'=>User::select('id', 'name')->get(),
            'teams'=>Team::select('id', 'name')->get()
        ];

        if ($request->isMethod('post')){
            $input = $request->all();
            $user = User::where('id', $input['user'])->select('name')->first();
            $teamName = Team::where('id', $input['team'])->select('name')->first();
            $team = Team::where('teams.id', $input['team'])
                ->join('members', 'members.team_id', '=', 'teams.id')
                ->where('members.user_id', $input['user'])
                ->select(
                    'teams.id as id',
                    'teams.name as name',
                    'teams.color as color',
                    'teams.description as description'
                );

            $data['title'] = 'Show team from ' . $user->name . ' and have name ' . $teamName->name;

            if(!$team->exists()){
                $data['message'] = "Item don`t exists)";
            } else {
                $data['t'] = $team->first();
                $data['membersCount'] = count(Member::getOnlyConfirmMembersList($data['t']->id));
            }
        }

        return view('query.query4', $data);
    }

    public function fivedQ(Request $request){
        $data = [
            'users'=>User::select('id', 'name')->get(),
            'teams'=>Team::select('id', 'name')->get()
        ];

        if ($request->isMethod('post')){
            $input = $request->all();
            $user = User::where('id', $input['user'])->select('name')->first();
            $teamName = Team::where('id', $input['team'])->select('name')->first();
            $team = Team::where('teams.id', $input['team'])
                ->join('members', 'members.team_id', '=', 'teams.id')
                ->where('members.user_id', $input['user'])
                ->select(
                    'teams.id as id'
                );

            $data['title'] = 'Show members team from ' . $user->name . ' and have name ' . $teamName->name;

            if(!$team->exists()){
                $data['message'] = "Item don`t exists)";
            } else {
                $data['members'] = Member::getMembersList($team->first()->id);
            }
        }

        return view('query.query5', $data);
    }


    public function sixdQ(Request $request){
        $data = [
            'teams'=>Team::select('id', 'name')->get()
        ];

        if ($request->isMethod('post')){

            $input = $request->all();

            $comments = Todoteamcomment::getCommentForTeam($input['task']);

            if(!$comments->exists()){
                $data['message'] = "Item don`t exists)";
            } else {
                $data['comments'] = $comments->get();
            }
        }

        return view('query.query6', $data);
    }

    public function sevenQ(Request $request){
        $data = [
            'teams'=>Team::select('id', 'name')->get(),
            'users'=>User::select('id', 'name')->get()
        ];

        if ($request->isMethod('post')){

            $input = $request->all();

            $todos = Todosteam::todoList($input['team'])
                ->where('memory_id', $input['user'])
                ->join('users as creator', 'todosteam.creator_id', '=', 'creator.id')
                ->join('users as member',  'todosteam.memory_id', '=', 'member.id')
                ->select(
                    'todosteam.title',
                    'todosteam.description',
                    'todosteam.status',
                    'todosteam.date_day as day',
                    'todosteam.date_month as month',
                    'todosteam.date_year as year',
                    'creator.name as creator',
                    'member.name as member'
                );

            $user = User::where('id', $input['user'])->select('name')->first();
            $teamName = Team::where('id', $input['team'])->select('name')->first();
            $data['title'] = 'Show tasks team from ' . $user->name . ' and have name ' . $teamName->name;
            if(!$todos->exists()){
                $data['message'] = "Item don`t exists)";
            } else {
                $data['todos'] = $todos->get();
            }
        }

        return view('query.query7', $data);
    }

    public function egeQ(Request $request){
        $data = [
            'users'=>User::select('id', 'name')->get()
        ];

        if ($request->isMethod('post')){

            $input = $request->all();
            $status = $input['status']=='d'?true:false;
            $events = Event::getForUserEvents($status, $input['user']);
            $user = User::where('id', $input['user'])->select('name')->first();
            $data['title'] = 'Show events list from ' . $user->name . ' and have status ' . ($status?'done':'not done');
            if(!$events->exists()){
                $data['message'] = "Item don`t exists)";
            } else {
                $data['events'] = $events->get();
            }
        }

        return view('query.query8', $data);
    }

}
