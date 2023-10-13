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

  <!-- Site stats components -->
  
  <div class="row" style="margin-bottom: 20px">
    <div class="col-md-3 mb-xl-0 mb-4">
      <div class="card">
      
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Non Solar Sites</p>
                <h5 class="font-weight-bolder">
                 {{$nonsolar}}
                   
                </h5>
                
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
     
      </div>
    </div>
    <div class="col-md-3 mb-xl-0 mb-4">
      <div class="card">
    
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Solar Sites</p>
                <h5 class="font-weight-bolder">
                  {{$solar}}
                </h5>
                
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      
      </div>
    </div>
    <div class="col-md-3 mb-xl-0 mb-4">
      <div class="card">
        
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">UPS Sites</p>
                <h5 class="font-weight-bolder">
                  {{$ups}}
                </h5>
                
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      
      </div>
    </div>
    <div class="col-md-3 mb-xl-0 mb-4">
      <div class="card">
        
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Delisted Sites</p>
                <h5 class="font-weight-bolder">
                  {{$dels}}
                </h5>
                
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      
      </div>
    </div>
  </div>


      <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <x-back-card />
            <h5 class="card-title">Client/Machine Overview</h5>
            <div class="d-flex align-items-center">
                
                <a href="/machine/add" class="btn btn-primary btn-sm ms-auto">Add Site</a>
                
            </div>
            <div class="row">
              <x-search2-card />

            </div>
            <!-- Search component -->

          </div>
          <div class="card-body px-0 pt-0 pb-2">
            @if (session()->has('message'))
              
            <p class="text-danger">{{session('message')}}</p>
            @endif
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0" id="searchTable">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Client Name</th>
                    
                    <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No of Machines</th>
                    <th class=" text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    
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
                      <a href="/viewmachines/{{$client->client_name}}" class="btn btn-success btn-sm" data-toggle="tooltip" data-original-title="View Client">
                        View 
                      </a> 

                    </td>
                  </tr>
                  @endforeach
                  
                  
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer">
            <div class="row tex-muted">
              
             
            </div>
           
          </div>
        </div>
      </div>
    </div>
    
    
    
    
@endsection