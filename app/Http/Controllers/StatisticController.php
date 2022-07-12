<?php

namespace App\Http\Controllers;

use App\Member;
use App\Todo;
use App\Todosteam;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
class StatisticController extends Controller
{
   public function todayStatistic(){

       $data = [
           'todayTask' =>
                Todo::todayList(Carbon::today())->exists()
                ?count(Todo::todayList(Carbon::today())->get()->toArray())
                :false,
           'overTask' =>
               Todo::overdueTasks(Carbon::today())->exists()
               ?count(Todo::overdueTasks(Carbon::today())->get()->toArray())
               :false,
            'teamTask' =>
                Todosteam::where('memory_id', Auth::user()->id)
                    ->where('status', false)
                    ->exists()
                ?count(Todosteam::where('memory_id', Auth::user()->id)
                    ->where('status', false)
                    ->get()
                    ->toArray())
                :false,
           'ownerTeamTask' =>
               Todosteam::where('creator_id', Auth::user()->id)
                   ->where('status', false)
                   ->exists()
               ?count(Todosteam::where('creator_id', Auth::user()->id)
                   ->where('status', false)
                   ->get()
                   ->toArray())
                :false,
           'invite' => Member::checkInvite(),
       ];
       echo view('site.statistic.today', $data);
   }
}
