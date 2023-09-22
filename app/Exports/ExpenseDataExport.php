<?php

namespace App\Exports;

use App\Models\Expense;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExpenseDataExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Expense::getAllExpenses());
    }
    public function headings(): array{
        return [
              'Staff Name',
              'Expense Date',
              'Expense Title',
              'Description',
              'Daily Total'
             
              
        ];
    }
}
