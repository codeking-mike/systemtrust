<?php

namespace App\Exports;

use App\Models\Upsmachine;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UpsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Upsmachine::getAllMachines());
    }
    public function headings(): array{
        return [
            'branch_code',
            'bm_name',
            'bm_number',
            'branch_address',
            'branch_state',
            'fse_assigned',
            'remarks',
            'ups_brand',
            'ups_capacity',
            'snmp_status',
            'battery_capacity',
            'number_of_batteries',
            'battery_brand',
            'load',
            'year_of_installation',
            'serial_number'
        ];
    }
}
