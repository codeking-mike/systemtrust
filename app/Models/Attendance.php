<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    use HasFactory;

    public static function getAllRecords(){
        $result = DB::table('attendances')
        ->select(
            'staff_name',
        'att_date',
        'time_in',
        'time_out'
        )
        ->get()->toArray();
        return $result;
    }
}
