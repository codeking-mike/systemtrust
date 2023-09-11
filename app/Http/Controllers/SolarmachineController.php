<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Machine;
use App\Models\Upsmachine;
use App\Models\Solarmachine;
use Illuminate\Http\Request;

class SolarmachineController extends Controller
{
    public function index(){
        return view('solarmachines.index', [
            'title' => 'Solar Sites',
            'machines'=> Solarmachine::latest()->get(),
            'nonsolar'=>$count=Machine::all()->count(),
            'solar'=>$count=Solarmachine::all()->count(),
            'ups'=>$count=Upsmachine::all()->count()
        ]);
    }

    public function store(Request $request){  
      $formFields = $request->validate([
              'branch_code'=> 'required',
              'bm_name' => 'required',
              'bm_number' =>'required',
              'branch_address'=>'required',
              'branch_state'=>'required',
              'fse_assigned'=>'required',
              'remarks'=>'required',
              'inverter_brand'=> 'required',
              'inverter_capacity' => 'required',
              'snmp_status'=>'required',
              'battery_spec'=>'required',
              'battery_qty'=>'required',
              'battery_brand'=>'required',
              'number_of_atms'=>'required',
              'solarpanel_type'=>'required',
              'solarpanel_capacity'=>'required',
              'solarpanel_number'=>'required',
              'charge_controller'=>'required',
              'number_of_inverter' =>'required',
              'date_inverter_deployed'=>'required',
              'inverter_age'=>'required',
              'last_battery_replaced'=>'required',
              'inverter_deployed_by'=>'required'

        ]); 
         
      Solarmachine::create($formFields);
      return redirect('/solarmachines');
      
    

    }

    public function show(Machine $machine){
        return view('machine.show', [
            'title'=>'View Machine',
            'machine'=>$machine
            

        ]);
    }
    public function create(){
        return view('solarmachines.create', [
            'users'=> User::latest()->get(),
            'title'=>'Add Machine'
        ]);
    }

}
