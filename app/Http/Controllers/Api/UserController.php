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
        $input = $request->all();
        if($request->isMethod('post')){
            User::create([
                'name'=>$input->name,
                'email'=>$input->email,
                'password'=>bcrypt($input->password),
            ]);

            return redirect('/welcome');
        }
    }
}
