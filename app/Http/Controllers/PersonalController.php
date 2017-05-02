<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function personalPage($name = null) {
        if($name == null || Auth::user()->name == $name)
            return redirect('/home');

        if(User::where('name', $name)->exists()){
            $user = User::where('name', $name)->first();
            return view('personal', [ 'user'=>$user ]);
        } else {
            return view('404');
        }
    }
}
