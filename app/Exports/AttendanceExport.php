<?php

namespace App\Exports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AttendanceExport implements FromCollection, WithHeadings
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
        'Staff Name',
        'Date',
        'Time In',
        'Time Out'
        ];
    }
}
