<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Expense;
use App\Models\Machine;
use App\Models\Attendance;
use App\Models\Upsmachine;
use App\Models\Notification;
use App\Models\Solarmachine;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        return view('dashboard.index', [
            'title' => 'Systemtrust ERP',
            'employees'=> Attendance::where('att_date', date('Y-m-d'))->get(),
            'todayAttendance'=> Attendance::where('att_date', date('Y-m-d'))->get(),
            'tasklist'=>Task::where('fse_assigned', auth()->user()->alias)->where('task_status', 'in progress')->get(),
            'tasks'=> $count=Task::where('task_status', 'in progress')->count(),
            'mytasks'=> $count=Task::where('task_status', 'in progress')->where('fse_assigned', auth()->user()->alias)->count(),
            'myexpenses'=> $count=Expense::where('status', 'pending')->where('staff_name', auth()->user()->alias)->count(),
            'attendance'=> Attendance::where('staff_name', auth()->user()->name)->where('att_date', date('Y-m-d'))->get(),
            'total'=>$count=User::all()->count(),
            'present'=>$count=Attendance::where('att_date', date('Y-m-d'))->count(),
            'mynonsolar'=>$count=Machine::where('fse_assigned', auth()->user()->alias)->count(),
            'mysolar'=>$count=Solarmachine::where('fse_assigned',auth()->user()->alias)->count(),
            'myups'=>$count=Upsmachine::where('fse_assigned', auth()->user()->alias)->count(),
            'notifications'=>Notification::latest()->where('receiver',auth()->user()->alias)->orWhere('receiver', 'all')->paginate(4)
        ]);
    }
}
