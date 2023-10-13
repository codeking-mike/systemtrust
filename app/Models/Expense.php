<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Expense extends Model
{
    use HasFactory;

    public static function getAllExpenses(){
        $result = DB::table('expenses')
        ->select(
        'staff_name',
        'expense_date',
        'description',
        'amount'
        
        )
        ->get()->toArray();
        return $result;
    }
}
