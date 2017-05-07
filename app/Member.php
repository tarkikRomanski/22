<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Member extends Model
{
    public $timestamps = false;
    protected $table = "members";
    protected $fillable = [
        'id', 'team_id', 'user_id', 'status'
    ];

    public static function checkInvite(){
        $userId = Auth::user()->id;
        $invite = Member::where('user_id', $userId)->where('status', false);
        if($invite->exists())
            return count($invite->get()->toArray());
        return false;
    }

    public static function checkInviteId($id){
        $userId = $id;
        $invite = Member::where('user_id', $userId)->where('status', false);
        if($invite->exists())
            return count($invite->get()->toArray());
        return false;
    }

    public static function getInvite(){
        $userId = Auth::user()->id;
        $invite = Member::where('user_id', $userId)
            ->where('status', false)
            ->join('teams', 'members.team_id', '=', 'teams.id')
            ->select( 'teams.id as id',
                'members.id as member_id',
                'teams.name as name',
                'teams.color as color',
                'teams.description as description');
        if($invite->exists())
            return $invite->get();
        return false;
    }

    public function scopeConfirmInvite($query){
        return $query->update(['status'=>true]);
    }

    public static function getMembersList($team){
        return Member::where('team_id', $team)
            ->join('users', 'members.user_id', '=', 'users.id')
            ->select(
                'members.status as status',
                'users.name as name',
                'users.email as email',
                'users.image as image',
                'members.user_id'
            )->get();
    }

    public static function getOnlyConfirmMembersList($team){
        return Member::where('team_id', $team)
            ->where('status', true)
            ->join('users', 'members.user_id', '=', 'users.id')
            ->select(
                'members.status as status',
                'users.name as name',
                'users.email as email',
                'users.image as image',
                'members.user_id'
            )->get();
    }
}
