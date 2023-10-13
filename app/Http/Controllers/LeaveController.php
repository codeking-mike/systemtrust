<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function index(){
        return view('leave.index', [
            'title'=>'Leave Information',
            'leaves'=>Leave::where('status', 'pending')->get(),
            'myleaves'=>Leave::where('staff_name', auth()->user()->name)
            ->where('status', 'pending')->get()
        ]);
    }

    public function index2(){

    return view('leave.index2');

    }

    public function history(){
        return view('leave.history', [
            'title'=>'Leave History',
            'leaves'=>Leave::latest()->get(),
            'myleaves'=>Leave::where('staff_name', auth()->user()->name)->get()
        ]);
    }
  
  
    public function show($id){
        $leave = Leave::find($id);
        return view('leave.show', [
            'title'=>'Update Leave Details',
            'leave'=>$leave
        ]);
    }
    public function create(){
        return view('leave.apply', [
            'title'=>'Request Leave'
        ]);
    }

    public function store(Request $request){

        $formFields = $request->validate([
              'staff_name' => ['string', 'nullable'],
              'leave_type' => ['string', 'nullable'],
              'fromdate'=> ['string', 'nullable'],
              'todate'=> ['string', 'nullable'],
              'reason'=> ['string', 'nullable'],
              'status'=> ['string', 'nullable']
              


        ]);
       
        Leave::create($formFields);
        return back()->with('message', 'Request submitted! Awaiting  approval');

    }

    public function update(Request $request, $id){
        $leave = Leave::find($id);
        $formFields = $request->validate([
            'staff_name' => ['string', 'nullable'],
            'leave_type' => ['string', 'nullable'],
            'fromdate'=> ['string', 'nullable'],
            'todate'=> ['string', 'nullable'],
            'reason'=> ['string', 'nullable'],
            'status'=> ['string', 'nullable']

        ]);
     $leave->fromdate = $formFields['fromdate'];
     $leave->reason = $formFields['reason'];
     $leave->todate = $formFields['todate'];
     $leave->status = $formFields['status'];
     $leave->update();

        return back()->with('message', 'Expense Updated Successfully!');

    }

    public function updateall(){
        Leave::where('status', 'pending')->update([
            'status'=>'processed'
        ]);

        return back()->with('message', 'Expense Updated Successfully!');

    }

    public function delete($id){
        Leave::where('id', $id)->delete();

        return back()->with('message', 'Deleted Successfully!');
    }

    public function exportToExcel(){
        return Excel::download(new LeaveDataExport, 'leaves.xlsx');
    }


    

}
