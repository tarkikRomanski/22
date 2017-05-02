<?php

namespace App\Http\Controllers;

use App\Todoteamcomment;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Auth;

class CommentController extends Controller
{
    public function add(Request $request){
        if($request->isMethod('post')){
            $date = Carbon::parse('today');
            $input = $request->all();
            $data = [
                'target_id'=>$input['target'],
                'owner_id'=>Auth::user()->id,
                'text'=>$input['text'],
                'date_year'=>$date->year,
                'date_month'=>$date->month,
                'date_day'=>$date->day,
            ];
            switch ($input['type']){
                case 'todoteam':
                    Todoteamcomment::create($data);
                    return back();
                    break;
            }
        }
    }
}
