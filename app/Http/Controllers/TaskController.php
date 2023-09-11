<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index(){
        return view('task.index', [
            'title'=>'Task',
            'task'=>Task::latest()->get(),
            

        ]);
    }

    public function show(Task $task){
        return view('task.show', [
            'title'=>'View Task',
            'task'=>$task
            

        ]);
    }

    public function completed(){

        return view('task.completed', [
            'title'=>'View Task',
            'task'=>Task::latest()->get()
            

        ]);
    }
    public function create(){
        return view('task.create', [
            'title'=>'Task',
            'task'=>Task::latest()->get(),
            'users'=>User::latest()->get(),
            'clients'=>Client::latest()->get(),

        ]);
    }

    public function store(Request $request){
        $formFields = $request->validate([
              'client_name'=> 'required',
              'location' => 'required',
              'task_description' =>'required',
              'task_type'=>'required',
              'fse_assigned'=>'required',
              'task_status'=>'required'
              


        ]);
        
        Task::create($formFields);

        return redirect('/tasks')->with('message', 'Task Created Successfully!');

    }

    public function update(Request $request){
        $formFields = $request->validate([
              'client_name'=> 'required',
              'location' => 'required',
              'task_description' =>'required',
              'task_type'=>'required',
              'fse_assigned'=>'required',
              'task_status'=>'required'
              


        ]);
        
        Task::update($formFields);

        return redirect('/tasks');

    }
}
