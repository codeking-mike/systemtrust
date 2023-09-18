@extends('layout2')

@section('content')

<div class="container-fluid py-4">

  <!-- Site stats components -->
  <div class="row" style="margin-bottom: 20px">
    
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <a href="/machines">
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
      </a>
      </div>
    </div>
  
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <a href="/solarmachines">
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
      </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <a href="/ups">
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
      </a>
      </div>
    </div>
  </div>

    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Solar Site List</h6>
            <div class="d-flex align-items-center">
              <a href="/solarmachines/create" class="btn btn-primary btn-sm ms-auto">Add Machine</a>
            </div>
            <!-- Search component -->
            <x-search-card />

          </div>
          <div class="card-body px-0 pt-0 pb-2">
            @if (session()->has('message'))
              
            <p class="text-danger">{{session('message')}}</p>
            @endif
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0" id="myTable">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Branch Code</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">BM's Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">BM's Number</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Location</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">State</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">FSE Assigned</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Inverter Brand</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Inverter Capacity</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">SNMP Status</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Battery Spec</th>
                    
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No of Battery</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Load</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Solar Panel Type</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Solar Panel Capacity</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No of Panels</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Charge Controller</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No of Inverter</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Inverter Deployed</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Inverter Age</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Last Battery Replaced</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Inverter Deployed By:</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach ( $machines as $machine)
                  <tr>
                    
                        
                   
                    <td>
                      <p class="text-xs text-danger font-weight-bold mb-0"><a href="sitehistory/{{$machine['branch_code']}}">{{$machine['branch_code']}}</a></p>
                        
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
                        <p class="text-xs font-weight-bold mb-0">{{$machine['fse_assigned']}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$machine['inverter_brand']}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$machine['inverter_capacity']}}</p>
                        
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
                        <p class="text-xs font-weight-bold mb-0">{{$machine['number_of_atms']}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$machine['solarpanel_type']}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$machine['solarpanel_capacity']}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$machine['solarpanel_number']}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$machine['charge_controller']}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$machine['number_of_inverter']}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$machine['date_inverter_deployed']}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$machine['inverter_age']}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$machine['last_battery_replaced']}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$machine['inverter_deployed_by']}}</p>
                        
                      </td>
                    
                    <td class="align-middle">
                      <a href="/editsolar/{{$machine['id']}}" class="btn btn-success btn-sm" data-toggle="tooltip" data-original-title="Edit Machine">
                        Edit
                      </a> /
                      <a href="/deletesolar/{{$machine['id']}}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Edit Machine">
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
    
    <div class="fixed-plugin">
        
        <div class="card shadow-lg">
          <div class="card-header pb-0 pt-3 ">
            
            <h4 class="card-title">Add Client</h4>
          </div>
          <hr class="horizontal dark my-1">
          <div class="card-body pt-sm-3 pt-0 overflow-auto">
            <form action="" method="post">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Client Name</label>
                  
                  <input type="text" name="client" class="form-control">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Contact Phone</label>
                  
                  <input type="text" name="phone" class="form-control">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Contact Email</label>
                  
                  <input type="text" name="email" class="form-control">
                </div>
              </div>
              
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Inverter Size</label>
                  
                  <input type="text" name="solution" class="form-control">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Client Address</label>
                  
                  <input type="text" name="solution" class="form-control">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                                    
                  <input type="submit" name="submit" class="btn btn-lg btn-danger" value="Add Client">
                </div>
              </div>
            </div>
          </form>
            
           
            
            
            
           
            
          </div>
        </div>
      </div>
    
    
@endsection