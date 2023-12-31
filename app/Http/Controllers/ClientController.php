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
            'nonsolar'=>Machine::latest()->get(),
            'solar'=>Solarmachine::latest()->get(),
            'ups'=>Upsmachine::latest()->get()

        ]);
    }

    public function home(){
        return view('clients.home', [
            'title'=>'Residential Clients',
            'clients'=>Client::where('client_type','home')->get(),
            'nonsolar'=>Machine::latest()->get(),
            'solar'=>Solarmachine::latest()->get(),
            'ups'=>Upsmachine::latest()->get()

        ]);
    }

    public function corporate(){
        return view('clients.corporate', [
            'title'=>'Corporate Clients',
            'clients'=>Client::where('client_type','corporate')->get(),
            'nonsolar'=>Machine::latest()->get(),
            'solar'=>Solarmachine::latest()->get(),
            'ups'=>Upsmachine::latest()->get()

        ]);
    }
   
    //get the number of machine a client has
   
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
  
    public function edit(Request $request, $id){
        $client = Client::find($id);
        return view('clients.edit', [
            'title'=>'Clients',
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
            'solution' =>['string', 'nullable'],
            'client_type'=>'required',
            'contact_email'=> ['string', 'nullable'],
            'contact_phone'=> ['string', 'nullable']
            
        

      ]);
      
      Client::create($formFields);

      return back()->with('message', 'Client Added Successfully!');
    }

    public function delete($id){
        Client::where('id', $id)->delete();

        return back()->with('message', 'Client Deleted Successfully!');
    }

    public function update(Request $request, $id){
        $client = Client::find($id);
        $formFields = $request->validate([
            
            'client_location' => ['string', 'nullable'],
            'solution' =>['string', 'nullable'],
            'contact_email'=> ['string', 'nullable'],
            'contact_phone'=> ['string', 'nullable']

      ]);

      $client->client_location = $formFields['client_location'];
      $client->solution = $formFields['solution'];
      $client->contact_email = $formFields['contact_email'];
      $client->contact_phone = $formFields['contact_phone'];
      
      $client->update();

      return back()->with('message', 'Client Updated Successfully!');
    }

}
