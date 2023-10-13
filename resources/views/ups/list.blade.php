@extends('layout2')

@section('content')

<div class="container-fluid py-4">

  <!-- Site stats components -->
  <div class="row" style="margin-bottom: 20px">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
       <a href="/machine/list">
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
        <a href="/solarmachines/list">
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
        <a href="/ups/list">
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
  </div>


      <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h4>UPS Site List</h4>
            
            <div class="row">
              <x-search-card />

            </div>
            <!-- Search component -->

          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0" id="myTable">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Client Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Branch Code</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">BM's Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">BM's Number</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Location</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">State</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">UPS Brand</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">UPS Capacity</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Number of Batteries</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">SNMP Status</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Battery Capacity</th>
                    
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Battery Brand</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Load</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Year of Installation</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Serial Number</th>
                    
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach ( $mymachines as $machine)
                  <tr>
                    
                    <td>
                      <p class="text-xs font-weight-bold mb-0 text-center">{{$machine['client_name']}}</p>
                      
                    </td>    
                   
                    <td>
                     
                          
                          <p class="text-xs font-weight-bold mb-0 text-center"><a href="editups/{{$machine['id']}}">{{$machine['branch_code']}}</a></p>
                        
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0 text-center">{{$machine['bm_name']}}</p>
                      
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0 text-center">{{$machine['bm_number']}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center">{{$machine['branch_address']}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center">{{$machine['branch_state']}}</p>
                        
                      </td>
                     
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center">{{$machine['ups_brand']}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center">{{$machine['ups_capacity']}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center">{{$machine['number_of_batteries']}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center">{{$machine['snmp_status']}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center">{{$machine['battery_capacity']}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center">{{$machine['battery_brand']}}</p>
                        
                      </td>
                      
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center">{{$machine['load']}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center">{{$machine['year_of_installation']}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center">{{$machine['serial_number']}}</p>
                        
                      </td>
                     
                    
                    <td class="align-middle">
                      <a href="/editups/{{$machine['id']}}" class="btn btn-success" data-toggle="tooltip" data-original-title="Edit Machine">
                        Edit
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