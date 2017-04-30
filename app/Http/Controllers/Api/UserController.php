<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function reg(Request $request)
    {
        if($request->isMethod('post')){
            $input = $request->all();
            User::create([
                'name'=>$input->name,
                'email'=>$input->email,
                'password'=>bcrypt($input->password),
                'sex'=>$input->sex=='male'?false:true,
                'image'=>$input->character
            ]);

            return redirect('/welcome');
        }
    }
}
