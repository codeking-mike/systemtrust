<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Machine;
use App\Models\Jobreport;
use App\Exports\UpsExport;
use App\Models\Upsmachine;
use App\Models\Solarmachine;
use Illuminate\Http\Request;
use App\Models\Delistedmachine;
use Maatwebsite\Excel\Facades\Excel;

class UpsController extends Controller
{
    public function index(){
        return view('ups.index', [
            'title' => 'UPS Sites',
            'machines'=> Upsmachine::latest()->paginate(50),
            'nonsolar'=>$count=Machine::all()->count(),
            'solar'=>$count=Solarmachine::all()->count(),
            'ups'=>$count=Upsmachine::all()->count()
        ]);
    }

    public function store(Request $request){  
        $formFields = $request->validate([
                'client_name'=> ['string', 'nullable'],
                'branch_code'=> ['string', 'nullable'],
                'bm_name' => ['string', 'nullable'],
                'bm_number' =>['string', 'nullable'],
                'branch_address'=>['string', 'nullable'],
                'branch_state'=>['string', 'nullable'],
                'fse_assigned'=>['string', 'nullable'],
                'remarks'=>['string', 'nullable'],
                'ups_brand'=> ['string', 'nullable'],
                'ups_capacity' => ['string', 'nullable'],
                'snmp_status'=>['string', 'nullable'],
                'battery_capacity'=>['string', 'nullable'],
                'number_of_batteries'=>['string', 'nullable'],
                'battery_brand'=>['string', 'nullable'],
                'load'=>['string', 'nullable'],
                'year_of_installation'=>['string', 'nullable'],
                'serial_number'=>['string', 'nullable']
  
          ]); 
           
        Upsmachine::create($formFields);
        return back()->with('message', 'Site Added Successfully');
        
      
  
      }
      public function update(Request $request, $id){
        $machine = Upsmachine::find($id);

        $machine->remarks = $request->input('remarks');
        $machine->ups_brand = $request->input('ups_brand');
        $machine->ups_capacity = $request->input('ups_capacity');
        $machine->number_of_batteries = $request->input('number_of_batteries');
        $machine->snmp_status = $request->input('snmp_status');
        $machine->battery_capacity = $request->input('battery_capacity');
        $machine->battery_brand = $request->input('battery_brand');
        $machine->load = $request->input('load');
        $machine->year_of_installation = $request->input('year_of_installation');
        $machine->serial_number = $request->input('serial_number');

        //update machine record
        $machine->update();

        //login user automatically
       // auth()->login($user);

        return back()->with('message', 'Details updated successfully!');


        
    }

  
      public function show($id){

            $ups = Upsmachine::find($id);
                return view('ups.show', [
                    'title'=>'View Machine',
                    'ups'=>$ups,
                    'history'=> Jobreport::where('machine_id', $id)->get()
                    
                ]); 
      }


      public function create(){
          return view('ups.create', [
              'users'=> User::latest()->get(),
              'clients'=> Client::latest()->get(),
              'title'=>'Add UPS Machine'
          ]);
      }

      public function list(){
        $exp = explode(' ', auth()->user()->name);
        $fname = $exp[0];
        return view('ups.list', [
            'title' => 'UPS Sites',
            'mymachines'=> Upsmachine::where('fse_assigned', $fname)->get(),
            'mynonsolar'=>$count=Machine::where('fse_assigned', $fname)->count(),
            'mysolar'=>$count=Solarmachine::where('fse_assigned', $fname)->count(),
            'myups'=>$count=Upsmachine::where('fse_assigned', $fname)->count(),
        ]);
    }

    public function delete($id){
        $machine = Upsmachine::find($id);
        $formDatas = [
            'client_name'=>$machine->client_name,
            'branch_code'=>$machine->branch_code,
            'branch_address'=>$machine->branch_address,
            'branch_state'=>$machine->branch_state,
            'fse_assigned'=>$machine->fse_assigned,
            'remarks'=>$machine->remarks,
            'machine_brand'=>$machine->ups_brand,
            'machine_capacity'=>$machine->ups_capacity,
            'machine_type'=>'UPS'
        ];

        Delistedmachine::create($formDatas);
        Upsmachine::where('id', $id)->delete();

        return redirect('/machine')->with('message', 'UPS Delisted Successfully!');
    }

    public function exportToExcel(){
        return Excel::download(new UpsExport, 'ups.xlsx');
    }
  
}
