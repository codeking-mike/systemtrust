<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Machine;
use App\Models\Upsmachine;
use App\Models\Solarmachine;
use Illuminate\Http\Request;

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
                'branch_code'=> 'required',
                'bm_name' => 'required',
                'bm_number' =>'required',
                'branch_address'=>'required',
                'branch_state'=>'required',
                'fse_assigned'=>'required',
                'remarks'=>'required',
                'ups_brand'=> 'required',
                'ups_capacity' => 'required',
                'snmp_status'=>'required',
                'battery_capacity'=>'required',
                'number_of_batteries'=>'required',
                'battery_brand'=>'required',
                'load'=>'required',
                'year_of_installation'=>'required',
                'serial_number'=>'required'
  
          ]); 
           
        Upsmachine::create($formFields);
        return redirect('/ups');
        
      
  
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
              'ups'=>$ups
              
          ]); 
      }


      public function create(){
          return view('ups.create', [
              'users'=> User::latest()->get(),
              'title'=>'Add UPS Machine'
          ]);
      }

      public function list(){
        $exp = explode(' ', auth()->user()->name);
        $fname = $exp[0];
        return view('ups.list', [
            'title' => 'UPS Sites',
            'mymachines'=> Upsmachine::where('fse_assigned', $fname)->paginate(60),
            'mynonsolar'=>$count=Machine::where('fse_assigned', $fname)->count(),
            'mysolar'=>$count=Solarmachine::where('fse_assigned', $fname)->count(),
            'myups'=>$count=Upsmachine::where('fse_assigned', $fname)->count(),
        ]);
    }
  
}
