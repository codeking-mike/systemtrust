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
  
      public function show(Upsmachine $machine){
        return view('ups.show', [
              'title'=>'View Machine',
              'machine'=>$machine
              
  
          ]); 
      }
      public function create(){
          return view('ups.create', [
              'users'=> User::latest()->get(),
              'title'=>'Add UPS Machine'
          ]);
      }
  
}
