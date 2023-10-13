<?php

namespace App\Http\Controllers;

use Excel;
use App\Models\User;
use App\Models\Client;
use App\Models\Machine;
use App\Models\Jobreport;
use App\Models\Upsmachine;
use App\Models\Solarmachine;
use Illuminate\Http\Request;
use App\Models\Delistedmachine;
use App\Exports\MachineDataExport;

class MachineController extends Controller
{
    public function index(){
        
        return view('machine.index', [
            'title' => 'Non-Solar Sites',
            'clients'=>Client::latest()->get(),
            'machines'=> Machine::latest()->paginate(60),
            'nonsolar'=>$count=Machine::all()->count(),
            'solar'=>$count=Solarmachine::all()->count(),
            'ups'=>$count=Upsmachine::all()->count(),
            'dels'=>$count=Delistedmachine::all()->count()

           
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

    public function viewmachines($name){
        return view('machine.viewmachines', [
            'title' => 'Client Sitelist',
            'client'=>$name,
            'mymachines'=> Machine::where('client_name', $name)->paginate(60),
            'mynonsolar'=>$count=Machine::where('client_name', $name)->count(),
            'mysolar'=>$count=Solarmachine::where('client_name', $name)->count(),
            'myups'=>$count=Upsmachine::where('client_name', $name)->count(),
            'dels'=>$count=Delistedmachine::where('client_name', $name)->count()
        ]);
    }

    public function viewmachines2($name){
        return view('machine.viewmachines2', [
            'title' => 'Client Sitelist',
            'client'=>$name,
            'mymachines'=> Solarmachine::where('client_name', $name)->paginate(60),
            'mynonsolar'=>$count=Machine::where('client_name', $name)->count(),
            'mysolar'=>$count=Solarmachine::where('client_name', $name)->count(),
            'myups'=>$count=Upsmachine::where('client_name', $name)->count(),
        ]);
    }
    public function viewmachines3($name){
        return view('machine.viewmachines3', [
            'title' => 'Client Sitelist',
            'client'=>$name,
            'mymachines'=> Upsmachine::where('client_name', $name)->paginate(60),
            'mynonsolar'=>$count=Machine::where('client_name', $name)->count(),
            'mysolar'=>$count=Solarmachine::where('client_name', $name)->count(),
            'myups'=>$count=Upsmachine::where('client_name', $name)->count(),
        ]);
    }


    public function store(Request $request){

        
      $formDatas = $request->validate([
              'client_name'=> ['string', 'nullable'],
              'branch_code'=>  ['string', 'nullable'],
              'bm_name' =>  ['string', 'nullable'],
              'bm_number' => ['string', 'nullable'],
              'branch_address'=> ['string', 'nullable'],
              'branch_state'=> ['string', 'nullable'],
              'fse_assigned'=> ['string', 'nullable'],
              'remarks'=> ['string', 'nullable'],
              'inverter_brand'=>  ['string', 'nullable'],
              'inverter_capacity' =>  ['string', 'nullable'],
              'number_of_inverter' => ['string', 'nullable'],
              'snmp_status'=> ['string', 'nullable'],
              'battery_spec'=> ['string', 'nullable'],
              'battery_qty'=> ['string', 'nullable'],
              'battery_brand'=> ['string', 'nullable'],
              'load'=> ['string', 'nullable'],
              'date_deployed'=> ['string', 'nullable'],
              'last_battery_replaced'=> ['string', 'nullable'],
              'inverter_deployed_by'=> ['string', 'nullable']

        ]); 
         
      Machine::create($formDatas);
      return back()->with('message', 'Site Added Succesfully!');
      
      

    }

    public function show($id){
        $machine = Machine::find($id);
        return view('machine.show', [
            'title'=>'View Machine',
            'machine'=>$machine,
            'history'=> Jobreport::where('machine_id', $id)->get()
            

        ]);
    }
    public function create(){
        return view('machine.create', [
            'users'=> User::latest()->get(),
            'clients'=> Client::latest()->get(),
            'title'=>'Add Machine'
        ]);
    }

    public function add(){
        return view('machine.add', [
            'title'=>'Add Machine'
        ]);
    }

    //update machine details

    
    public function update(Request $request, $id){
        $machine = Machine::find($id);
        $formFields = $request->validate([
            'branch_code'=>  ['string', 'nullable'],
            'bm_name' =>  ['string', 'nullable'],
            'bm_number' => ['string', 'nullable'],
            'branch_address'=> ['string', 'nullable'],
            'branch_state'=> ['string', 'nullable'],
              'remarks'=>['string', 'nullable'],
              'inverter_brand'=> ['string', 'nullable'],
              'inverter_capacity' => ['string', 'nullable'],
              'number_of_inverter' =>['string', 'nullable'],
              'snmp_status'=>['string', 'nullable'],
              'battery_spec'=>['string', 'nullable'],
              'battery_qty'=>['string', 'nullable'],
              'battery_brand'=>['string', 'nullable'],
              'load'=>['string', 'nullable'],
              'date_deployed'=>['string', 'nullable'],
              'last_battery_replaced'=>['string', 'nullable'],
              'inverter_deployed_by'=>['string', 'nullable']

        ]);
        $machine->branch_code = $formFields['branch_code'];
        $machine->bm_name = $formFields['bm_name'];
        $machine->bm_number = $formFields['bm_number'];
        $machine->branch_address = $formFields['branch_address'];
        $machine->branch_state = $formFields['branch_state'];
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
        $machine = Machine::find($id);
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
        Machine::where('id', $id)->delete();

        return redirect('/machine')->with('message', 'Machine Delisted Successfully!');
    }

    public function exportToExcel(){
        return Excel::download(new MachineDataExport, 'machine.xlsx');
    }

        
   }
