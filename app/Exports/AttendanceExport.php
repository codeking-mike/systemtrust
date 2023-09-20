<?php

namespace App\Exports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\FromCollection;

class AttendanceExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Attendance::getAllRecords());
    }
    public function headings(): array{
        return [
         'staff_name',
        'att_date',
        'time_in',
        'time_out'
        ];
    }
}
