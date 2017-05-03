<?php

namespace App\Http\Controllers;

use App\Member;
use App\Team;
use App\User;
use Illuminate\Http\Request;

use Auth;

class TeamsController extends Controller
{
    public function add(Request $request){
        if($request->isMethod('post')){
            $input = $request->all();

            Team::createNewTeam($input);

            return back();
        }
    }

    public function getUserTeam() {
        if(!Team::where('id', Auth::user()->id)->exists())
            $team = false;
        else
            $team = Team::getThisUserTeamInformation();
        echo view('site.team.userTeam', ['team'=>$team]);
    }

    public function getListTeam(){
        $teams = Team::getTeamsList();
        echo view('site.team.list', ['teams'=>$teams]);
    }

    public function checkInvite(){
        echo Member::checkInvite();
    }

    public function getInvite(){
        echo view('site.team.list', ['teams'=>Member::getInvite(), 'invite'=>true]);
    }

    public function confirmInvite($id = null){
        Member::where('id', $id)->confirmInvite();
        return back();
    }

    public function teamPage($id = null){
        if($id == null)
            return redirect('/t/'. Auth::user()->id);

        $data = [
            'team' => Team::where('id', $id)->first(),
            'members'=>Member::getMembersList($id),
            'select' => Member::getOnlyConfirmMembersList($id)
        ];

        //dd(Member::getMembersList($id)->toArray());

        return view('site.team.page', $data);
    }

    public function sendInvite($user){
        if (User::where('name', $user)->exists()){
            $user = User::where('name', $user)->first()->id;
            Member::create([
                'user_id'=>$user,
                'team_id'=>Auth::user()->id,
                'status'=>false
            ]);
            echo true;
        } else if (User::where('email', $user)->exists()){
            $user = User::where('email', $user)->first()->id;
            Member::create([
                'user_id'=>$user,
                'team_id'=>Auth::user()->id,
                'status'=>false
            ]);
            echo true;
        } else {
            echo false;
        }
    }

    public function editFromId(Request $request){
        if($request->isMethod('post')){
            $input = $request->all();

            Team::where('id', $input['team'])
                ->update([
                    'name'=>$input['teamName'],
                    'description'=>$input['teamDescription']
                ]);

            return back();
        }
    }
}
