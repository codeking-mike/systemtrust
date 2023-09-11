<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Machine;
use App\Models\Upsmachine;
use App\Models\Solarmachine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    public function index(){
        return view('machine.index', [
            'title' => 'Non-Solar Sites',
            'machines'=> Machine::latest()->paginate(60),
            'nonsolar'=>$count=Machine::all()->count(),
            'solar'=>$count=Solarmachine::all()->count(),
            'ups'=>$count=Upsmachine::all()->count(),
        ]);
    }
    public function store(Request $request){

        
      $formDatas = $request->validate([
              'branch_code'=> 'required',
              'bm_name' => 'required',
              'bm_number' =>'required',
              'branch_address'=>'required',
              'branch_state'=>'required',
              'fse_assigned'=>'required',
              'remarks'=>'required',
              'inverter_brand'=> 'required',
              'inverter_capacity' => 'required',
              'number_of_inverter' =>'required',
              'snmp_status'=>'required',
              'battery_spec'=>'required',
              'battery_qty'=>'required',
              'battery_brand'=>'required',
              'load'=>'required',
              'date_deployed'=>'required',
              'last_battery_replaced'=>'required',
              'inverter_deployed_by'=>'required'

        ]); 
         
      Machine::create($formDatas);
      return redirect('/machine');
      
      

    }

    public function show(Machine $machine){
        return view('machine.show', [
            'title'=>'View Machine',
            'machine'=>$machine
            

        ]);
    }
    public function create(){
        return view('machine.create', [
            'users'=> User::latest()->get(),
            'title'=>'Add Machine'
        ]);
    }

        
   }
