<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Jobreport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\notifyUser;


class JobreportController extends Controller
{
    //
    public function index(){
        return view('reports.index', [
            'title' => 'Job Report',
            'reports'=> Jobreport::paginate(40),
            'myreports'=> Jobreport::where('fse_assigned', auth()->user()->name)->get()
        ]);
    }

    public function show(Jobreport $report){
        return view('reports.show', [
            'machine'=> $report,
            'title'=>'View Report'
        ]);
    }

    public function jcc(){
        return view('reports.jcc', [
            'title'=>'Submit JCC',
            'clients'=>Client::all()
        ]);
    }

    public function edit($id){
        $report = Jobreport::find($id);
        return view('reports.edit', [
            'title'=>'Edit JCC Report',
            'report'=>$report
        ]);
    }

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
        //create user
        unset($formFields['_token']);
        unset($formFields['_method']);
        unset($formFields['submit']);

        Jobreport::create($formFields);

 //sendmail to support
 //sendmail to support
 $subject = "Report For ". $formFields['client_name']. " ".  $formFields['site_address'];
 $body .= $formFields['job_description'];
/*
 $details = $formFields['equipment_type']. ": ".$formFields['equipment_brand']. $formFields['equipment_capacity']. "\n";
 $details .= 'Load: '. $formFields['load_description']."\n";
 $details .= 'Gen/Grid run time: '. $formFields['genrun_time'].$formFields['phcnrun_time']."\n";
 $details .= 'Input Voltage: '. $formFields['siteinput_voltage']." Output Voltage: ".$formFields['siteoutput_voltage']."\n";
 $details .= 'Frequency: '. $formFields['site_frequency']." AVR: ".$formFields['avr_brand'].$formFields['avr_capacity']."\n";
 $details .= 'Site Diagnosis: '. $formFields['site_diagnosis']."\n";
 $details .= 'Battery Voltage Readings: '. $formFields['battery_voltage_reading']; */

 $machine = $formFields['equipment_type'];
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
  




 Mail::to('support@systemtrustng.com')->cc(auth()->user()->email)->send(new notifyUser($subject, $body, auth()->user()->name, $details));
 
 
        return back()->with('message', 'Report submitted successfully!');

    }

    public function delete($id){
        Jobreport::where('id', $id)->delete();

        return back()->with('message', 'Report Deleted Successfully!');
    }
}
