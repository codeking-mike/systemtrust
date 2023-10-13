@extends('layout2')

@section('content')
@php
    use App\Models\Machine;
   use App\Models\Solarmachine;
use App\Models\Upsmachine;

 function getMachineNum($client){

    
        $nonsolar = $count=Machine::where('client_name', $client)->count();
        $solar = $count=Solarmachine::where('client_name', $client)->count();
        $ups = $count=Upsmachine::where('client_name', $client)->count();
    
      $total = $nonsolar + $solar + $ups;
      return $total;
}
@endphp
<div class="container-fluid py-4">
  
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <x-back-card />
          <div class="card-header pb-0">
            <h6>Corporate Clients </h6>
            <div class="d-flex align-items-center">
                
                <a href="/clients/create" class="btn btn-primary btn-sm ms-auto">Add Client</a>
              </div>
              <div class="row">
                <x-search2-card />
    
              </div>
          </div>
          
          <div class="card-body px-0 pt-0 pb-2">
            <x-flash-message />
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0" id="searchTable">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Client Name</th>
                    
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No of Machines</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach ( $clients as $client)
                  <tr>
                    
                        
                   
                    <td>
                      <div class="d-flex px-2 py-1">
                        
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$client['client_name']}}</h6>
                          
                        </div>
                      </div>
                    </td>
                    
                    <td>
                      <p class="text-xs font-weight-bold mb-0">{{getMachineNum($client->client_name)}}</p>
                      
                    </td>
                    
                    <td class="align-middle">
                      <a href="/viewclient/{{$client['id']}}" class="btn btn-success btn-sm" data-toggle="tooltip" data-original-title="View Client">
                        View Client
                      </a> / 
                      <a href="/deleteclient/{{$client['id']}}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete Client">
                        Delete
                      </a>

                    </td>
                  </tr>
                  @endforeach
                  
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    
    
    
@endsection