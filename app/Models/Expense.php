<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Expense extends Model
{
    use HasFactory;
    protected $fillable = ['staff_name', 'expense_date','expense_title', 
    'description', 'status'];

    public static function getAllExpenses(){
        $result = DB::table('expenses')
        ->select(
        'staff_name',
        'expense_date',
        'expense_title',
        'description',
        'daily_total'
        
        )
        ->get()->toArray();
        return $result;
    }
}
