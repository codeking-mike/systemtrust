<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Attendance;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        return view('dashboard.index', [
            'title' => 'Systemtrust ERP',
            'employees'=> Attendance::where('att_date', date('Y-m-d'))->get(),
            'total'=>$count=User::all()->count(),
            'present'=>$count=Attendance::where('att_date', date('Y-m-d'))->count()
        ]);
    }
}
