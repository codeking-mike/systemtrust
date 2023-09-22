<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Machine;
use App\Models\Solarmachine;
use App\Models\Upsmachine;
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

    public function show(Request $request, $id){
        $client = Client::find($id);
        return view('clients.show', [
            'title'=>'Clients',
            'nonsolar'=>$count=Machine::where('client_name', $client->client_name)->count(),
            'solar'=>$count=Solarmachine::where('client_name',$client->client_name)->count(),
            'ups'=>$count=Upsmachine::where('client_name',$client->client_name)->count(),
            'client'=>$client
        ]);
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

    public function delete($id){
        Client::where('id', $id)->delete();

        return back()->with('message', 'Client Deleted Successfully!');
    }

    public function update(Request $request, $id){
        $client = Client::find($id);
        $formFields = $request->validate([
            
            'client_location' => 'required',
            'solution' =>'required',
            'contact_email'=> 'required',
            'contact_phone'=> 'required',
            
        

      ]);

      $client->client_location = $formFields['client_location'];
      $client->solution = $formFields['solution'];
      $client->client_email = $formFields['client_email'];
      $client->client_phone = $formFields['client_phone'];
      
      $client->update();

      return redirect('/clients');
    }

}
