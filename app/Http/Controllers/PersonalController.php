<?php

namespace App\Http\Controllers;

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
}
