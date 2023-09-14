<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    //

    public function index(){
        return view('attendance.index', [
            'title' => 'Todays Attendance',
            'todayAttendance'=> Attendance::where('att_date', date('Y-m-d'))->get(),
            'attendance'=> Attendance::where('staff_name', auth()->user()->name)->get(),
            'total'=>$count=User::all()->count(),
            'present'=>$count=Attendance::where('att_date', date('Y-m-d'))->count()
        ]);
    }

    public function history(){
        return view('attendance.history', [
            'title' => 'Todays Attendance',
            'attendance'=> Attendance::where('staff_name', auth()->user()->name)->get()
        ]);
    }

    public function checkin(Request $request){

    $checkedin = Attendance::where('att_date', date('Y-m-d'))->get();

    $formFields = $request->validate([
        'staff_name'=>'required',
        'att_date'=>'required',
        'time_in'=>'required'
    ]);
    
foreach($checkedin as $ckin){
    if($ckin->staff_name == $formFields['staff_name']){
        return redirect('/dashboard')->with('error', 'You already checked-in today!');
    }
}
Attendance::create($formFields);

return redirect('/dashboard')->with('message', 'Check-in Successful');
   

    }

    public function checkout(Request $request, Attendance $attn){
        $formFields = $request->validate([
            'time_out'=>'required'
        ]);

        $attn->update($formFields);

        return redirect('/dashboard')->with('message', 'Check Out Successful!');
   }

   
}
