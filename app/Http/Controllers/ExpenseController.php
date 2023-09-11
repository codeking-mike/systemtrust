<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    //
    public function index(){
        return view('expenses.index', [
            'title'=>'Expenses Data',
            'expenses'=>Expense::latest()->get()
        ]);
    }

    public function create(){
        return view('expenses.create', [
            'title'=>'Add Expense'
        ]);
    }

    public function store(Request $request){
        $formFields = $request->validate([
              'staff_name'=> 'required',
              'expense_date' => 'required',
              'expense_title' =>'required',
              'description'=>'required',
              'status'=>'required'
              


        ]);
        
        Expense::create($formFields);

        return redirect('/expenses');

    }
}
