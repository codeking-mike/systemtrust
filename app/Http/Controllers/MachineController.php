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

    public function list(){
        $exp = explode(' ', auth()->user()->name);
        $fname = $exp[0];
        return view('machine.list', [
            'title' => 'Non-Solar Sites',
            'mymachines'=> Machine::where('fse_assigned', $fname)->paginate(60),
            'mynonsolar'=>$count=Machine::where('fse_assigned', $fname)->count(),
            'mysolar'=>$count=Solarmachine::where('fse_assigned', $fname)->count(),
            'myups'=>$count=Upsmachine::where('fse_assigned', $fname)->count(),
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

    public function show($id){
        $machine = Machine::find($id);
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

    //update machine details

    
    public function update(Request $request, $id){
        $machine = Machine::find($id);
        $formFields = $request->validate([
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
        $machine->remarks = $formFields['remarks'];
        $machine->inverter_brand = $formFields['inverter_brand'];
        $machine->inverter_capacity = $formFields['inverter_capacity'];
        $machine->number_of_inverter = $formFields['number_of_inverter'];
        $machine->snmp_status = $formFields['snmp_status'];
        $machine->battery_spec = $formFields['battery_spec'];
        $machine->battery_qty = $formFields['battery_qty'];
        $machine->battery_brand = $formFields['battery_brand'];
        $machine->load = $formFields['load'];
        $machine->date_deployed = $formFields['date_deployed'];
        $machine->last_battery_replaced = $formFields['last_battery_replaced'];
        $machine->inverter_deployed_by = $formFields['inverter_deployed_by'];

        //update machine record
        $machine->update();

        //login user automatically
       // auth()->login($user);

        return back()->with('message', 'Details updated successfully!');


        
    }


    public function delete($id){
        Machine::where('id', $id)->delete();

        return back()->with('message', 'Machine Deleted Successfully!');
    }



        
   }
