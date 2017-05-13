<?php

namespace App\Http\Controllers;

use App\Category;
use App\Team;
use App\Type;
use App\User;
use Auth;
use App\Member;
use App\Todo;
use App\Todosteam;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function personalPage($name = null) {
        if($name == null || Auth::user()->name == $name)
            return redirect('/home');

        if(User::where('name', $name)->exists()){
            $user = User::where('name', $name)->first();
            $data = [
                'todayTask' =>
                    Todo::todayListId(Carbon::today(), $user->id)->exists()
                        ?count(Todo::todayListId(Carbon::today(), $user->id)->get()->toArray())
                        :false,
                'overTask' =>
                    Todo::overdayTasksId(Carbon::today(), $user->id)->exists()
                        ?count(Todo::overdayTasksId(Carbon::today(), $user->id)->get()->toArray())
                        :false,
                'teamTask' =>
                    Todosteam::where('memory_id', $user->id)
                        ->where('status', false)
                        ->exists()
                        ?count(Todosteam::where('memory_id', $user->id)
                        ->where('status', false)
                        ->get()
                        ->toArray())
                        :false,
                'ownerTeamTask' =>
                    Todosteam::where('creator_id', $user->id)
                        ->where('status', false)
                        ->exists()
                        ?count(Todosteam::where('creator_id', $user->id)
                        ->where('status', false)
                        ->get()
                        ->toArray())
                        :false,
                'invite' => Member::checkInviteId($user->id),
                'user'=>$user
            ];


            return view('personal', $data);
        } else {
            return view('404');
        }
    }

    public function getTeamPage(){
        return view('site.team');
    }

    public function getEventPage(){
        return view('site.event');
    }

    public function getQueryPage(){
        return view('site.querys');
    }

    public function admin(Request $request){
        if($request->isMethod('post')){

            switch ($request->type){
                case 't':
                    Type::create([
                        'name'=>$request->typeName,
                        'color'=>$request->typeColor
                    ]);
                    break;
                case 'c':
                    Category::create([
                        'name'=>$request->categoryName,
                        'color'=>$request->categoryColor
                    ]);
                    break;
            }

            return back();
        }

        $data = [
            'types' => Type::all(),
            'categories' => Category::all()
        ];

        return view('site.admin', $data);
    }

    public function teamUsersList($team){
        $users = Member::getOnlyConfirmMembersList($team);
        $html = '';
        foreach($users as $user){
            $html .= '<option value="'.$user->user_id.'">'.$user->name.'</option>';
        }

        echo $html;
    }

    public function querynine(Request $request){
        if($request->isMethod('post')){
            $input = $request->all();
        }

        $data = [
            'users' => User::all(),
            'teams' => Team::all()
        ];

        return view('site.query', $data);
    }

    public function teamTodoList($team, $user, $s){

        if(!Todosteam::todoList($team)->where('memory_id', $user)->where('status', $s)->exists()) {
            $data = [
                'messeage' => 'Team 2Do list EMPTY <span class="emoji"></span>'
            ];
        }
        $data['todos'] = Todosteam::todoList($team)->where('memory_id', $user)->where('status', $s)->get();

        echo view('site.team.todo.list', $data);
    }
}
