<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Machine;
use App\Models\Attendance;
use App\Models\Upsmachine;
use App\Models\Solarmachine;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        $exp = explode(' ', auth()->user()->name);
        $fname = $exp[0];

        return view('dashboard.index', [
            'title' => 'Systemtrust ERP',
            'employees'=> Attendance::where('att_date', date('Y-m-d'))->get(),
            'tasks'=> $count=Task::where('task_status', 'in progress')->count(),
            'mytasks'=> $count=Task::where('task_status', 'in progress')->where('fse_assigned', auth()->user()->name)->count(),
            'attendance'=> Attendance::where('staff_name', auth()->user()->name)->where('att_date', date('Y-m-d'))->get(),
            'total'=>$count=User::all()->count(),
            'present'=>$count=Attendance::where('att_date', date('Y-m-d'))->count(),
            'mynonsolar'=>$count=Machine::where('fse_assigned', $fname)->count(),
            'mysolar'=>$count=Solarmachine::where('fse_assigned', $fname)->count(),
            'myups'=>$count=Upsmachine::where('fse_assigned', $fname)->count(),
        ]);
    }
}
