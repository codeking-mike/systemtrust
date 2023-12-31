<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Upsmachine extends Model
{
    use HasFactory;

    public static function getAllMachines(){
        $result = DB::table('upsmachines')
        ->select(
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
        )
        ->get()->toArray();
        return $result;
    }
}
