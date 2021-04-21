<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function addTask(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'finish_date' => 'required',
            'description' => 'required'
        ],
        [
            'name.required' => "Por favor adicione um nome à tarefa!",
            'description.required' => "Por favor adicione uma descrição à tarefa!",
            'finish_date.required' => "Por favor adicione uma data limite à tarefa!"
        ]
        );


        if($req->except('_token') !== null)
        {
            Task::insert([
                'name' =>  $req->name,
                'finish_date' =>  $req->finish_date,
                'description' =>  $req->description
            ]);
        }

        return redirect('/');
    }

    public function showTask()
    {      
        $tarefas = \DB::table("tasks")->get()->reverse()->toArray();
        
        return view('tarefas',['tarefas' => $tarefas]);
    }

    public function removeTask(Task $task)
    {
        $task->delete();
      
        return redirect('/');
    }
}
