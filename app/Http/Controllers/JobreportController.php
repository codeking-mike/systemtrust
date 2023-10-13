<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Machine;
use App\Mail\notifyUser;
use App\Models\Jobreport;
use App\Models\Upsmachine;
use App\Models\Solarmachine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class JobreportController extends Controller
{
    //
    public function index(){
        return view('reports.index', [
            'title' => 'Job Report',
            'reports'=> Jobreport::paginate(40),
            'myreports'=> Jobreport::where('fse_assigned', auth()->user()->name)->get(),
            'nonsolar'=>$count=Machine::all()->count(),
            'solar'=>$count=Solarmachine::all()->count(),
            'ups'=>$count=Upsmachine::all()->count()
        ]);
    }

    public function show(Jobreport $report){
        return view('reports.show', [
            'machine'=> $report,
            'title'=>'View Report'
        ]);
    }

    public function nonsolar(){
        return view('reports.nonsolar', [
            'machines'=> Machine::latest()->get(),
            'title'=>'Submit Report'
        ]);
    }

    public function solar(){
        return view('reports.solar', [
            'machines'=> Solarmachine::latest()->get(),
            'title'=>'Submit Report'
        ]);
    }

    public function ups(){
        return view('reports.ups', [
            'machines'=> Upsmachine::latest()->get(),
            'title'=>'Submit Report'
        ]);
    }

    public function jcc($id){
        $machine = Solarmachine::find($id);
        return view('reports.jcc', [
            'title'=>'Submit JCC',
            'machine'=> $machine
        ]);
    }

    public function jcc1($id){
        $machine = Machine::find($id);
        return view('reports.jcc1', [
            'title'=>'Submit JCC',
            'machine'=> $machine
        ]);
    }

    public function jcc2($id){
        $machine = Upsmachine::find($id);
        return view('reports.jcc2', [
            'title'=>'Submit JCC',
            'machine'=> $machine
        ]);
    }


    public function edit($id){
        $report = Jobreport::find($id);
        return view('reports.edit', [
            'title'=>'Edit JCC Report',
            'report'=>$report
        ]);
    }

    //create nonsolar report
    public function store(Request $request){

    $subject=''; $body=''; $details='';
    
        $formFields = $request->all();
        //upload profilepic
        if($request->hasFile('jcc')){
            $formFields['jcc'] = $request->file('jcc')->store('userimages', 'public');
        }
        if($request->hasFile('erf')){
            $formFields['erf'] = $request->file('erf')->store('userimages', 'public');
        }
        if($request->hasFile('site')){
            $formFields['site'] = $request->file('site')->store('userimages', 'public');
        }
        //create user
        unset($formFields['_token']);
        unset($formFields['_method']);
        unset($formFields['submit']);
         $surge = $formFields['surge'];
         $environs = $formFields['environs'];
         $cabling = $formFields['cabling'];
        $remarks = <<<IDENTIFIER

        Surge Available: $surge
        Site Environs: $environs
        Site Cabling: $cabling
        
        IDENTIFIER;
        Machine::where('id', $formFields['machine_id'])->update([
            'remarks'=>$remarks,
            'last_battery_replaced'=>$formFields['last_battery_replaced'],
        ]);
        
       Jobreport::create($formFields);

 //sendmail to support
 //sendmail to support
 $subject = "Report For ". $formFields['client_name']. " ".  $formFields['site_address'];
 $body .= $formFields['job_description'];

 $machine = 'Inverter';
 $brand=$formFields['equipment_brand'];
 $capacity= $formFields['equipment_capacity'];
 $load= $formFields['load_description'];
 $gen= $formFields['genrun_time']. " ". $formFields['phcnrun_time'];
 $input = $formFields['siteinput_voltage'];
 $output =$formFields['siteoutput_voltage'];
 $frequency= $formFields['site_frequency'];
 $avr=$formFields['avr_brand'];
 $avr_capacity=$formFields['avr_capacity'];
 $diagnosis = $formFields['site_diagnosis'];
 $battery = $formFields['battery_voltage_reading'];


$details = <<<IDENTIFIER

Machine: $machine $brand $capacity

Gen/Grid Run Time:  $gen
Input Voltage:   $input
Output Voltage:  $output
Frequency:   $frequency
AVR: $avr $avr_capacity

Site Diagnosis: $diagnosis

Battery Voltage Readings:  $battery

IDENTIFIER;
  
//send mail to support and copy user
 Mail::to('support@systemtrustng.com')->cc(auth()->user()->email)->send(new notifyUser($subject, $body, auth()->user()->name, $details));
 
 
        return back()->with('message', 'Report submitted successfully!');

    }

//create nonsolar report
public function store2(Request $request){

    $subject=''; $body=''; $details='';
    
        $formFields = $request->all();
        //upload profilepic
        if($request->hasFile('jcc')){
            $formFields['jcc'] = $request->file('jcc')->store('userimages', 'public');
        }
        if($request->hasFile('erf')){
            $formFields['erf'] = $request->file('erf')->store('userimages', 'public');
        }
        if($request->hasFile('site')){
            $formFields['site'] = $request->file('site')->store('userimages', 'public');
        }
        //create user
        unset($formFields['_token']);
        unset($formFields['_method']);
        unset($formFields['submit']);
         $surge = $formFields['surge'];
         $environs = $formFields['environs'];
         $cabling = $formFields['cabling'];
        $remarks = <<<IDENTIFIER

        Surge Available: $surge
        Site Environs: $environs
        Site Cabling: $cabling
        
        IDENTIFIER;
        Solarmachine::where('id', $formFields['machine_id'])->update([
            'remarks'=>$remarks,
            'last_battery_replaced'=>$formFields['last_battery_replaced'],
        ]);
        
       Jobreport::create($formFields);

 //sendmail to support
 //sendmail to support
 $subject = "Report For ". $formFields['client_name']. " ".  $formFields['site_address'];
 $body .= $formFields['job_description'];

 $machine = 'Inverter';
 $brand=$formFields['equipment_brand'];
 $capacity= $formFields['equipment_capacity'];
 $load= $formFields['load_description'];
 $gen= $formFields['genrun_time']. " ". $formFields['phcnrun_time'];
 $input = $formFields['siteinput_voltage'];
 $output =$formFields['siteoutput_voltage'];
 $frequency= $formFields['site_frequency'];
 $avr=$formFields['avr_brand'];
 $avr_capacity=$formFields['avr_capacity'];
 $diagnosis = $formFields['site_diagnosis'];
 $battery = $formFields['battery_voltage_reading'];


$details = <<<IDENTIFIER

Machine: $machine $brand $capacity

Gen/Grid Run Time:  $gen
Input Voltage:   $input
Output Voltage:  $output
Frequency:   $frequency
AVR: $avr $avr_capacity

Site Diagnosis: $diagnosis

Battery Voltage Readings:  $battery

IDENTIFIER;
  
//send mail to support and copy user
 Mail::to('support@systemtrustng.com')->cc(auth()->user()->email)->send(new notifyUser($subject, $body, auth()->user()->name, $details));
 
 
        return back()->with('message', 'Report submitted successfully!');

    }

    public function store3(Request $request){

        $subject=''; $body=''; $details='';
        
            $formFields = $request->all();
            //upload profilepic
            if($request->hasFile('jcc')){
                $formFields['jcc'] = $request->file('jcc')->store('userimages', 'public');
            }
            if($request->hasFile('erf')){
                $formFields['erf'] = $request->file('erf')->store('userimages', 'public');
            }
            if($request->hasFile('site')){
                $formFields['site'] = $request->file('site')->store('userimages', 'public');
            }
            //create user
            unset($formFields['_token']);
            unset($formFields['_method']);
            unset($formFields['submit']);
             $surge = $formFields['surge'];
             $environs = $formFields['environs'];
             $cabling = $formFields['cabling'];
            $remarks = <<<IDENTIFIER
    
            Surge Available: $surge
            Site Environs: $environs
            Site Cabling: $cabling
            
            IDENTIFIER;
            Upsmachine::where('id', $formFields['machine_id'])->update([
                'remarks'=>$remarks
            ]);
            
           Jobreport::create($formFields);
    
     //sendmail to support
     //sendmail to support
     $subject = "Report For ". $formFields['client_name']. " ".  $formFields['site_address'];
     $body .= $formFields['job_description'];
    
     $machine = 'UPS';
     $brand=$formFields['equipment_brand'];
     $capacity= $formFields['equipment_capacity'];
     $load= $formFields['load_description'];
     $gen= $formFields['genrun_time']. " ". $formFields['phcnrun_time'];
     $input = $formFields['siteinput_voltage'];
     $output =$formFields['siteoutput_voltage'];
     $frequency= $formFields['site_frequency'];
     $avr=$formFields['avr_brand'];
     $avr_capacity=$formFields['avr_capacity'];
     $diagnosis = $formFields['site_diagnosis'];
     $battery = $formFields['battery_voltage_reading'];
    
    
    $details = <<<IDENTIFIER
    
    Machine: $machine $brand $capacity
    
    Gen/Grid Run Time:  $gen
    Input Voltage:   $input
    Output Voltage:  $output
    Frequency:   $frequency
    AVR: $avr $avr_capacity
    
    Site Diagnosis: $diagnosis
    
    Battery Voltage Readings:  $battery
    
    IDENTIFIER;
      
    //send mail to support and copy user
     Mail::to('support@systemtrustng.com')->cc(auth()->user()->email)->send(new notifyUser($subject, $body, auth()->user()->name, $details));
     
     
            return back()->with('message', 'Report submitted successfully!');
    
        }
    

    public function delete($id){
        Jobreport::where('id', $id)->delete();

        return back()->with('message', 'Report Deleted Successfully!');
    }
}
