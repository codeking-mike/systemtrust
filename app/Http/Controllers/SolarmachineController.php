<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Machine;
use App\Models\Jobreport;
use App\Models\Upsmachine;
use App\Models\Solarmachine;
use Illuminate\Http\Request;
use App\Models\Delistedmachine;
use App\Exports\SolarDataExport;
use App\Exports\MachineDataExport;
use Maatwebsite\Excel\Facades\Excel;

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
              'client_name' => ['string', 'nullable'],
              'branch_code'=> ['string', 'nullable'],
              'bm_name' => ['string', 'nullable'],
              'bm_number' =>['string', 'nullable'],
              'branch_address'=>['string', 'nullable'],
              'branch_state'=>['string', 'nullable'],
              'fse_assigned'=>['string', 'nullable'],
              'remarks'=>['string', 'nullable'],
              'inverter_brand'=> ['string', 'nullable'],
              'inverter_capacity' => ['string', 'nullable'],
              'snmp_status'=>['string', 'nullable'],
              'battery_spec'=>['string', 'nullable'],
              'battery_qty'=>['string', 'nullable'],
              'battery_brand'=>['string', 'nullable'],
              'number_of_atms'=>['string', 'nullable'],
              'solarpanel_type'=>['string', 'nullable'],
              'solarpanel_capacity'=>['string', 'nullable'],
              'solarpanel_number'=>['string', 'nullable'],
              'charge_controller'=>['string', 'nullable'],
              'number_of_inverter' =>['string', 'nullable'],
              'date_inverter_deployed'=>['string', 'nullable'],
              'inverter_age'=>['string', 'nullable'],
              'last_battery_replaced'=>['string', 'nullable'],
              'inverter_deployed_by'=>['string', 'nullable']

        ]); 
         
      Solarmachine::create($formFields);
      return back()->with('message', 'Site Added Successfully!');
      
    

    }

    public function show($id){
        $machine = Solarmachine::find($id);
        return view('solarmachines.show', [
            'title'=>'View Machine',
            'machine'=>$machine,
            'history'=> Jobreport::where('machine_id', $id)->get()

        ]);
    }
    public function create(){
        return view('solarmachines.create', [
            'users'=> User::latest()->get(),
            'clients'=> Client::latest()->get(),
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
        $machine = Solarmachine::find($id);
        $formDatas = [
            'client_name'=>$machine->client_name,
            'branch_code'=>$machine->branch_code,
            'branch_address'=>$machine->branch_address,
            'branch_state'=>$machine->branch_state,
            'fse_assigned'=>$machine->fse_assigned,
            'remarks'=>$machine->remarks,
            'machine_brand'=>$machine->inverter_brand,
            'machine_capacity'=>$machine->inverter_capacity,
            'machine_type'=>'Inverter'
        ];

        Delistedmachine::create($formDatas);
        Solarmachine::where('id', $id)->delete();

        return redirect('/machine')->with('message', 'Machine Delisted Successfully!');
    }

    public function exportToExcel(){
        return Excel::download(new SolarDataExport, 'solar.xlsx');
    }
  

}
