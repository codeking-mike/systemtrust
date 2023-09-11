<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        return view('clients.index', [
            'title'=>'Clients',
            'clients'=>Client::latest()->get(),
            'corp'=>$count=Client::where('client_type','corporate')->count(),
            'home'=>$count=Client::where('client_type','home')->count(),
        ]);
    }

    public function show(){
        
    }

    public function create(){
        return view('clients.create', [
            'title'=>'Add Client'

        ]);
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'client_name'=> 'required',
            'client_location' => 'required',
            'solution' =>'required',
            'client_type'=>'required',
            'contact_email'=> 'required',
            'contact_phone'=> 'required',
            
        

      ]);
      
      Client::create($formFields);

      return redirect('/clients');
    }

}
