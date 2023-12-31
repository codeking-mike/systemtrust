<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Solarmachine extends Model
{
    use HasFactory;

    public static function getAllMachines(){
        $result = DB::table('solarmachines')
        ->select(
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
        )
        ->get()->toArray();
        return $result;
    }
}
