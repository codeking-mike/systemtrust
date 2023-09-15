<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Machine;
use App\Models\Jobreport;
use App\Models\Upsmachine;
use App\Models\Solarmachine;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index($id){
        return view('history.index', [
             'task'=> Task::where('branch_code', $id)->get(),
             'nonsolar'=>$count=Machine::where('branch_code', $id)->count(),
            'solar'=>$count=Solarmachine::where('branch_code', $id)->count(),
            'ups'=>$count=Upsmachine::where('branch_code', $id)->count(),
            'reports'=> Jobreport::where('branch_code', $id)->get(),
            'title'=>'Site History',
            'code'=>$id
        ]);
    }

   
}
