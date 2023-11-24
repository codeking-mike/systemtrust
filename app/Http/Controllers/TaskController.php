<?php

namespace App\Http\Controllers;

use Mail;
use Exception;
use Carbon\Carbon;
use App\Models\Task;
use App\Models\User;
use App\Models\Client;
use App\Mail\notifyUser;
use App\Mail\sendreport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'task'=>$task,
            'users'=>User::latest()->get()
            

        ]);
    }

    public function completed(){
        $date = Carbon::today()->subDays(90);
        return view('task.completed', [
            'title'=>'View Task',
            'task'=>Task::where('task_status', 'completed')
            ->where('created_at', '>=', $date)->get()
            

        ]);
    }

    public function getAll(){
        
        return view('task.all', [
            'title'=>'View All Task',
            'task'=>Task::where('task_status', 'completed')->paginate(50)
            

        ]);
    }

    public function list(){

        return view('task.list', [
            'title'=>'View Task',
            'task'=>Task::where('fse_assigned', auth()->user()->alias)
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
        $body =''; $subject='';
        $formFields = $request->validate([
              'client_name'=> 'required',
              'branch_code'=>'required',
              'location' => 'required',
              'task_description' =>'required',
              'task_type'=>'required',
              'fse_assigned'=>'required',
              'task_status'=>'required'
              


        ]);

        $email = DB::select('SELECT email FROM users WHERE alias = ?' , [$formFields['fse_assigned']]);
        
        //sendmail to user on task assignment.

        $subject = "Task Assigned";
        $body .= 'You have been assigned a task with the details: ' .$formFields['task_description']. 
        '.At ' .$formFields['client_name']. 'in' .$formFields['location'].'.Kindly login to the app to view details.';
    


        Task::create($formFields);
       // Mail::to($email)->send(new sendreport($subject, $body, $formFields['fse_assigned']));
       Mail::to($email)->send(new sendreport($subject, $body, $formFields['fse_assigned'] ));
    
       //send whatsapp message
        $twilioSid = config('app.twilio_sid');
        $twilioToken = config('app.twilio_auth_token');
        $twl = [
            'sid'=>  $twilioSid,
            'token'=> $twilioToken
        ];
        $twilioWhatsAppNumber = config('app.twilio_whatsapp_number');
        $recipientNumber = 'whatsapp:+2348167440736'; // Replace with the recipient's phone number in WhatsApp format (e.g., "whatsapp:+1234567890")
        $message = "Hello from Twilio WhatsApp API in Laravel! 🚀";

        $twilio = new Client($twl);

        try {
            $twilio->messages->create(
                $recipientNumber,
                [
                    "from" => $twilioWhatsAppNumber,
                    "body" => $message,
                ]
            );

            return response()->json(['message' => 'WhatsApp message sent successfully']);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }


        

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

        $body =''; $subject=''; $details='';

        $task = Task::find($id);
        $formFields = $request->all();
        //upload profilepic
        if($request->hasFile('jcc')){
            $formFields['jcc'] = $request->file('jcc')->store('userimages', 'public');
        }
        if($request->hasFile('erf')){
            $formFields['erf'] = $request->file('erf')->store('userimages', 'public');
        }
        if($request->hasFile('site')){
            $formFields['site'] = $request->file('site')->store('userimages', 'public');
        }
        //create user 
        $task->site_param = $formFields['site_param'];
        $task->machine_details = $formFields['machine_details'];
        $task->diagnosis = $formFields['diagnosis'];
        $task->remarks = $formFields['remarks'];
        $task->jcc = $formFields['jcc'];
        $task->erf = $formFields['erf'];
        $task->site = $formFields['site'];
        $task->task_status = $formFields['task_status'];

        $task->update();


 //sendmail to support
 $subject = "Task Report";
 $body .= 'Report for ' .$task->task_type. ' at '.$task->location.' ';
 $machine = $formFields['machine_details'];
 $site = $formFields['site_param'];
 $diagnosis = $formFields['diagnosis'];
 $remarks = $formFields['remarks'];
 
 Mail::to('support@systemtrustng.com')->cc(auth()->user()->email)->send(new notifyUser($subject, $body, $machine, $site, $diagnosis, $remarks, auth()->user()->name));
 
        return back()->with('message', 'Report sent successfully!');

  }

    public function delete($id){
        Task::where('id', $id)->delete();

        return back()->with('message', 'Task Deleted Successfully!');
    }
}
