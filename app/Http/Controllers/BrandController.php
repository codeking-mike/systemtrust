<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //
    public function index(){
        return view('brands.index', [
            'title'=>'Corporate Clients',
            'clients'=>Brand::latest()->get()
        ]);
    }

    public function show(){
        
    }
}
