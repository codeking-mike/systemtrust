<?php

namespace App\Exports;

use App\Models\Solarmachine;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class SolarDataExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Solarmachine::getAllMachines());
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
            'inverter_brand',
            'inverter_capacity',
            'snmp_status',
            'battery_spec',
            'battery_qty',
            'battery_brand',
            'number_of_atms',
            'solarpanel_type',
            'solarpanel_capacity',
            'solarpanel_number',
            'charge_controller',
            'number_of_inverter',
            'date_inverter_deployed',
            'inverter_age',
            'last_battery_replaced',
            'inverter_deployed_by'
        ];
    }
}
