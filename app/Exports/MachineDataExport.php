<?php

namespace App\Exports;

use App\Models\Machine;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MachineDataExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Machine::getAllMachines());
    }
    public function heading(): array{
        return [
              'Branch Code',
              'Bm_Name',
              'Bm_Number',
              'Branch_Address',
              'Branch_State',
              'Fse_Assigned',
              'Remarks',
              'Inverter_Brand',
              'Inverter_Capacity',
              'Number_of_Inverter',
              'Snmp_Status',
              'Battery_Spec',
              'Battery_Qty',
              'Battery_Brand',
              'Load',
              'Date_Deployed',
              'Last_Battery_Replaced',
              'Inverter_Deployed_By'
        ];
    }
}
