<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
              'load'=>'required',
              'date_deployed',
              'last_battery_replaced',
              'inverter_deployed_by'
    ]; 
}
