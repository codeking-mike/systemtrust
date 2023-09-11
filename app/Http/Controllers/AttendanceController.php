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
            'employees'=> Attendance::where('att_date', date('Y-m-d'))->get(),
            'total'=>$count=User::all()->count(),
            'present'=>$count=Attendance::where('att_date', date('Y-m-d'))->count()
        ]);
    }

    public function checkin(Request $request){
         $formFields = $request->all();

         Attendance::create($formFields);

         return redirect('/dashboard')->with('message', 'Check-in Successful');
    }
    public function checkout(Request $request){
        $formFields = $request->validate([
            'staff_name'=>'required',
            'att_date'=>'required',
            'time_in'=>'required'
        ]);

        Attendance::create($formFields);

        return redirect('/dashboard')->with('message', 'Check-in Successful');
   }
}
