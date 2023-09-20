<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Exports\AttendanceExport;
use Maatwebsite\Excel\Facades\Excel;

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
        $date = Carbon::today()->subDays(30);
        return view('attendance.history', [
            'title' => 'Todays Attendance',
            'attendance'=> Attendance::where('staff_name', auth()->user()->name)
            ->where('created_at', '>=', $date)->get()
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

   public function exportToExcel(){
    return Excel::download(new AttendanceExport, 'attendance.xlsx');
}

   
}
