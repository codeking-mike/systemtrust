<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use App\Exports\ExpenseDataExport;
use Maatwebsite\Excel\Facades\Excel;

class ExpenseController extends Controller
{
    //
    public function index(){
        return view('expenses.index', [
            'title'=>'Expenses Data',
            'expenses'=>Expense::where('status', 'pending')->get(),
            'myexpenses'=>Expense::where('staff_name', auth()->user()->name)
            ->where('status', 'pending')->get()
        ]);
    }
  
    public function show($id){
        $expense = Expense::find($id);
        return view('expenses.create2', [
            'title'=>'Update Expense',
            'expenses'=>$expense
        ]);
    }
    public function create(){
        return view('expenses.create', [
            'title'=>'Add Expense',
            'myexpenses'=>Expense::where('staff_name', auth()->user()->name)
            ->where('status', 'pending')->get()
        ]);
    }

    public function store(Request $request){

        $formFields = $request->validate([
              'staff_name' => ['string', 'nullable'],
              'expense_date' => ['string', 'nullable'],
              'description'=> ['string', 'nullable'],
              'amount'=> ['string', 'nullable'],
              'status'=> ['string', 'nullable']
              


        ]);
       
        Expense::create($formFields);
        return back()->with('message', 'Expense Submitted!');

    }

    public function update(Request $request, $id){
        $expense = Expense::find($id);
        $formFields = $request->validate([
              'expense_date' =>'string',
              'amount' =>'string',
              'description'=>'string'

        ]);
     $expense->expense_date = $formFields['expense_date'];
     $expense->description = $formFields['description'];
     $expense->amount = $formFields['amount'];
     $expense->update();

        return back()->with('message', 'Expense Updated Successfully!');

    }

    public function updateall(){
        Expense::where('status', 'pending')->update([
            'status'=>'processed'
        ]);

        return back()->with('message', 'Expense Updated Successfully!');

    }

    public function delete($id){
        Expense::where('id', $id)->delete();

        return back()->with('message', 'Deleted Successfully!');
    }

    public function exportToExcel(){
        return Excel::download(new ExpenseDataExport, 'expenses.xlsx');
    }

   
}
