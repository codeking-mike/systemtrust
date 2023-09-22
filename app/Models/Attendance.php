<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    use HasFactory;

    public static function getAllRecords(){
        $date = Carbon::today()->subDays(30);
        $result = DB::table('attendances')
        ->select(
        'staff_name',
        'att_date',
        'time_in',
        'time_out'
        )
        ->where('created_at', '>=', $date)
        ->get()->toArray();
        return $result;
    }
}
