<?php

namespace App\Http\Controllers;

use App\Mail\sendnotice;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{
    public function index(){
        return view('notifications.index', [
            'title' => 'Systemtrust ERP',
            'notifications'=>Notification::latest()->where('receiver',auth()->user()->alias)->orWhere('receiver', 'all')->paginate(20)
        ]);
    }

    public function create(){
        return view('notifications.create', [
            'title' => 'Systemtrust ERP',
            'users'=>User::where('name','!=', auth()->user()->name)->get()
        ]);
    }

    public function store(Request $request){
        $formData = $request->validate([
            'receiver'=> ['string', 'required'],
              'message'=>'required',
              'sender' => 'required',
              'status'=>'required'
        ]);
  if($formData['receiver'] == 'all'){
    
    $receiver = 'michael@systemtrustng.com';
    $subject = "New Notification";
    $body = $formData['message'];
    $sender = $formData['sender'];

    Mail::to($receiver)->send(new sendnotice($subject, $body, $receiver, $sender));

  }else{
    $receiver = DB::select('SELECT email FROM users WHERE alias = ?' , [$formData['receiver']]);
   
    $subject = "New Notification";
    $body = $formData['message'];
    $sender = $formData['sender'];

    Mail::to($receiver)->send(new sendnotice($subject, $body, $receiver, $sender));

  }
        

        Notification::create($formData);

        return back()->with('message', 'Notification Posted Successfully!');
        
    }
}
