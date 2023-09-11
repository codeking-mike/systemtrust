<?php

namespace App\Http\Controllers;

use App\Models\Jobreport;
use Illuminate\Http\Request;

class JobreportController extends Controller
{
    //
    public function index(){
        return view('reports.index', [
            'title' => 'Job Report',
            'machines'=> Jobreport::all()
        ]);
    }

    public function show(Jobreport $report){
        return view('reports.show', [
            'machine'=> $report,
            'title'=>'View Report'
        ]);
    }
}
