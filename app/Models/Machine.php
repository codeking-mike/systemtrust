<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Machine extends Model
{
    use HasFactory;

    protected $fillable = [
              'branch_code',
              'bm_name',
              'bm_number',
              'branch_address',
              'branch_state',
              'fse_assiggned',
              'inverter_brand',
              'inverter_capacity',
              'number_of_inverter',
              'snmp_status',
              'battery_brand',
              'battery_capacity',
              'battery_qty',
              'load',
              'date_deployed',
              'last_battery_replaced',
              'inverter_deployed_by'
    ]; 

    public static function getAllMachines(){
        $result = DB::table('machines')
        ->select(
        'branch_code',
        'bm_name',
        'bm_number',
        'branch_address',
        'branch_state',
        'fse_assigned',
        'inverter_brand',
        'inverter_capacity',
        'number_of_inverter',
        'snmp_status',
        'battery_brand',
        'battery_spec',
        'battery_qty',
        'load',
        'date_deployed',
        'last_battery_replaced',
        'inverter_deployed_by'
        )
        ->get()->toArray();
        return $result;
    }
}
