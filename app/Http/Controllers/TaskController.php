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

    public function show($id){
        $task = Task::find($id);
        return view('task.show', [
            'title'=>'View Task',
            'task'=>$task
            

        ]);
    }

    public function completed(){

        return view('task.completed', [
            'title'=>'View Task',
            'task'=>Task::where('task_status', 'completed')->get()
            

        ]);
    }

    public function list(){

        return view('task.list', [
            'title'=>'View Task',
            'task'=>Task::where('fse_assigned', auth()->user()->name)
            ->where('task_status', 'in progress')->get()
            

        ]);
    }

    public function submitreport($id){
     $task = Task::find($id);
        return view('task.submitreport', [
            'title'=>'Submit Report',
            'task'=>$task
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

    public function viewreport($id){
        $task = Task::find($id);
        return view('task.viewreport', [
            'title'=>'Task',
            'task'=>$task

        ]);

        //create an option to download report in pdf and excel
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
        $user = User::find($formFields['fse_assigned']);
        //sendmail to user on task assignment.
        Task::create($formFields);

        return redirect('/tasks')->with('message', 'Task Created Successfully!');

    }

    public function update(Request $request, $id){
        $task = Task::find($id);
        $task->fse_assigned = $request->input('fse_assigned');
        $task->task_status = $request->input('task_status');
        $task->remarks = $request->input('remarks');
        
        $task->update();

        return back()->with('message', 'Task Updated Successfully!');


    }

    public function report(Request $request, $id){
        $task = Task::find($id);
        $formFields = $request->all();
        //upload profilepic
        if($request->hasFile('jcc')){
            $formFields['jcc'] = $request->file('jcc')->store('userimages', 'public');
        }
        if($request->hasFile('erf')){
            $formFields['erf'] = $request->file('erf')->store('userimages', 'public');
        }
        //create user 

        $task->remarks = $formFields['remarks'];
        $task->jcc = $formFields['jcc'];
        $task->erf = $formFields['erf'];
        $task->task_status = $formFields['task_status'];

        $task->update();

 //sendmail to support
 
        return back()->with('message', 'Details updated successfully!');

    }
}
