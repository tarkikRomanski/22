<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Todo;

use Auth;

class TodoController extends Controller
{
    private Todo $todo;

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function add(Request $request){
        if ($request->isMethod('post')){

            $input = $request->all();
            $date = Carbon::parse($input['when']);
            Todo::create([
                'title' => $input['title'],
                'description' => $input['description']!=''?$input['description']:null,
                'owner_id' => Auth::user()->id,
                'status' => false,
                'date_year' => $date->year,
                'date_month' => $date->month,
                'date_day' => $date->day,
            ]);

            return back();
        }
    }

    public function getTodayList(){
        $date = Carbon::parse('today');

        $todoQuery = $this->todo->getTodayList($date);

        if(!$todoQuery->exists()) {
            $data = [
                'message' => 'U 2Do list EMPTY, create first task!<span class="emoji"></span>'
            ];
        }

        $data['todos'] = $todoQuery->get();

        echo view('site.todo.list', $data);
    }

    public function getById($id = null){
        if ($id === null) {
            return;
        }

        if(!Todo::where('id', $id)->exists()) {
            echo '<h2>Data does not exist</h2>';

            return;
        }

        $todo = Todo::find($id);

        echo $todo->owner_id == Auth::user()->id
            ? view('site.todo.set', ['todo' => $todo])
            : '<h2>You dont have promise!</h2>';
    }

    public function toggleStatus($id){
        if ($id === null) {
            return;
        }

        $todo = Todo::where('id', $id)->first();

        if($todo && $todo->owner_id !== Auth::user()->id) {
            return;
        }

        Todo::where('id', $id)->update([
            'status'=> $todo->status === 0
        ]);
    }

    public function delete($id){
        if ($id === null) {
            return;
        }

        $todo = Todo::where('id', $id)->first();

        if($todo->owner_id !== Auth::user()->id) {
            return;
        }

        Todo::where('id', $id)->delete();
    }

    public function editFromId(Request $request, $id = null){
        if($request->isMethod('post')){
            $input = $request->all();

            $update = [
                'title' => $input['title'],
                'description' => $input['description']
            ];

            if (isset($input['ttomorrow'])) {
                $date = Carbon::parse('tomorrow');
                $update['date_year'] = $date->year;
                $update['date_month'] = $date->month;
                $update['date_day'] = $date->day;
            }

            Todo::where('id', $input['id'])
                ->update($update);

            return back();
        }

        if($id != null){
            if(Todo::where('id', $id)->exists()) {

                $todo = Todo::find($id);

                if($todo->owner_id == Auth::user()->id)
                    echo view('site.todo.edit', ['todo' => $todo]);
                else
                    echo '<h2>You dont have promise!</h2>';
            } else {
                echo '<h2>Data does not exist</h2>';
            }
        }
    }
}
