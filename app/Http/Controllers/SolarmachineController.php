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

    public function show($id){
        $machine = Solarmachine::find($id);
        return view('solarmachines.show', [
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

    public function list(){
        $exp = explode(' ', auth()->user()->name);
        $fname = $exp[0];
        return view('solarmachines.list', [
            'title' => 'Solar Sites',
            'mymachines'=> Solarmachine::where('fse_assigned', $fname)->paginate(60),
            'mynonsolar'=>$count=Machine::where('fse_assigned', $fname)->count(),
            'mysolar'=>$count=Solarmachine::where('fse_assigned', $fname)->count(),
            'myups'=>$count=Upsmachine::where('fse_assigned', $fname)->count(),
        ]);
    }

    //update machines

    public function update(Request $request, $id){ 
        
        $machine = Solarmachine::find($id);
          $machine->remarks = $request->input('remarks');
          $machine->inverter_brand = $request->input('inverter_brand');
           $machine->inverter_capacity = $request->input('inverter_capacity');
          
          $machine->snmp_status = $request->input('snmp_status');
          $machine->battery_spec = $request->input('battery_spec');
          $machine->battery_qty = $request->input('battery_qty');
          $machine->battery_brand = $request->input('battery_brand');
          $machine->number_of_atms = $request->input('number_of_atms');
          $machine->solarpanel_type = $request->input('solarpanel_type');
          $machine->solarpanel_capacity = $request->input('solarpanel_capacity');
          $machine->solarpanel_number = $request->input('solarpanel_number');
          $machine->charge_controller = $request->input('charge_controller');
          $machine->number_of_inverter = $request->input('charge_controller');
          $machine->date_inverter_deployed = $request->input('date_inverter_deployed');
          $machine->inverter_age = $request->input('inverter_age');
          $machine->last_battery_replaced = $request->input('last_battery_replaced');
          $machine->inverter_deployed_by = $request->input('inverter_deployed_by');

        $machine->update();
        return back()->with('message', 'Details updated successfully!');
        
      
  
      }

      public function delete($id){
        Solarmachine::where('id', $id)->delete();

        return back()->with('message', 'Machine Deleted Successfully!');
    }
  

}
