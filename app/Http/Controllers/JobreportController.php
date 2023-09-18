<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Jobreport;
use Illuminate\Http\Request;

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
 
        return back()->with('message', 'Report submitted successfully!');

    }

    public function delete($id){
        Jobreport::where('id', $id)->delete();

        return back()->with('message', 'Report Deleted Successfully!');
    }
}
