@extends('layout2')

@section('content')

<div class="container-fluid py-4">

  <!-- Site stats components -->
  <div class="row" style="margin-bottom: 20px">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
       <a href="#">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Non Solar Sites</p>
                <h5 class="font-weight-bolder">
                 {{$mynonsolar}}
                   
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
      </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <a href="/viewmachines2/{{$client}}">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Solar Sites</p>
                <h5 class="font-weight-bolder">
                  {{$mysolar}}
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
      </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <a href="/viewmachines3/{{$client}}">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">UPS Sites</p>
                <h5 class="font-weight-bolder">
                  {{$myups}}
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
      </a>
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
          <x-back-card />
          <div class="card-header pb-0">
            <h5 class="card-title pb-2">{{$client}} Non-solar sites</h5>
            
            <div class="row">
              <x-search-card />

            </div>
            <!-- Search component -->

          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-4">
              <table class="table align-items-center mb-0" id="myTable">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Branch Code</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">BM's Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">BM's Number</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Location</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">State</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Inverter Brand</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Inverter Capacity</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Number of Inverters</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SNMP Status</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Battery Spec</th>
                    
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Number of Battery</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Load</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Inverter Deployed</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Last Battery Replaced</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Inverter Deployed By:</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach ( $mymachines as $machine)
                  <tr>
                    
                        
                   
                    <td>
                      <div class="d-flex px-2 py-1">
                        
                        <div class="d-flex flex-column justify-content-center">
                          
                          <p class="text-xs text-secondary mb-0"><a href="editmachine/{{$machine['id']}}">{{$machine['branch_code']}}</a></p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0">{{$machine['bm_name']}}</p>
                      
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">{{$machine['bm_number']}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$machine['branch_address']}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$machine['branch_state']}}</p>
                        
                      </td>
                     
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$machine['inverter_brand']}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$machine['inverter_capacity']}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$machine['number_of_inverter']}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$machine['snmp_status']}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$machine['battery_brand']}} {{$machine['battery_spec']}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$machine['battery_qty']}}</p>
                        
                      </td>
                      
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$machine['load']}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$machine['date_deployed']}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$machine['last_battery_replaced']}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$machine['inverter_deployed_by']}}</p>
                        
                      </td>
                    
                    <td class="align-middle">
                      <a href="/editmachine/{{$machine->id}}" class="btn btn-secondary text-xs" data-toggle="tooltip" data-original-title="Edit Machine">
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
              <p class="card-text">
                {{$mymachines->links()}}
              </p>
             
            </div>
           
          </div>
        </div>
      </div>
    </div>
    
    
    
    
@endsection