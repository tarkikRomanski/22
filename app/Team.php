<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Member;
use Auth;

class Team extends Model
{
    //
    public $timestamps = false;
    protected $table = "teams";
    protected $fillable = [
        'id', 'name', 'description', 'color'
    ];

    public static function createNewTeam($input){
        Team::create([
            'id'=>Auth::user()->id,
            'name'=>$input['name'],
            'description'=>$input['description'],
            'color'=>$input['color']
        ]);

        Member::create([
            'user_id'=>Auth::user()->id,
            'team_id'=>Auth::user()->id,
            'status'=>true
        ]);
    }

    public static function getThisUserTeamInformation(){
        $team = Team::where('id', Auth::user()->id)->first()->toArray();
        $membersCount = count(Member::where('team_id', $team['id'])->where('status', true)->get()->toArray());
        $team['member_count'] = $membersCount;
        return $team;
    }

    public static function getTeamsList(){
        $userId = Auth::user()->id;
        $join = Member::where('user_id', $userId)
            ->where('status', true)
            ->join('teams', function ($join){
                $join->on('teams.id', '=', 'members.team_id')
                    ->on('teams.id', '!=', 'members.user_id');
            })
            ->select('teams.id as id', 'teams.name as name', 'teams.color as color', 'teams.description as description')
            ;
        if($join->exists())
            return $join->get();
        return false;
    }



}
