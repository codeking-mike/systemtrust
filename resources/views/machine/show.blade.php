@extends('layout2')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-10">
      <div class="col-md-8">
        <div class="card">
          <x-back-card />
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Update Machine Data or View <a href='#history' class="text-success font-bold">Maintenance History</a></p>
              
            </div>
          </div>
          <div class="card-body">
            @if (session()->has('message'))
              
            <p class="text-success">{{session('message')}}</p>
            @endif
            <form action="/machine/{{$machine->id}}" method="post">
                @csrf
                @method('PUT')
              <div class="row">
                <div class="col-md-12 row">
                    <div class="form-group col-md-6">
                        <label for="" class="form-control-lable">Client Name</label>
                        <input type="text" name="client_name" class="form-control" value="{{$machine->client_name}}" readonly>

                    </div>
                    <div class="form-group">
                      <label for="" class="form-control-lable">Branch Code</label>
                      <input type="text" name="branch_code" class="form-control" value="{{$machine->branch_code}}">

                  </div>
                </div>
                <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">BM Name</label>
                        
                        <input type="text" name="bm_name" class="form-control" value="{{$machine->bm_name}}">
                       
                    </div>
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">BM Number</label>
                      
                      <input type="text" name="bm_number" class="form-control" value="{{$machine->bm_number}}">
                     
                    </div>
                    
                </div>
                <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Branch Location</label>
                        
                        <input type="text" name="branch_address" class="form-control" value="{{$machine->branch_address}}">
                       
                    </div>
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">State</label>
                      
                      <input type="text" name="branch_state" class="form-control" value="{{$machine->branch_state}}">
                      
                    </div>
                    
                </div>
                
                  <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Inverter Brand</label>
                        
                        <input type="text" name="inverter_brand" class="form-control" value="{{$machine->inverter_brand}}">
                        @error('inverter_brand')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">Inverter Capacity</label>
                      
                      <input type="text" name="inverter_capacity" class="form-control" value="{{$machine->inverter_capacity}}">
                      
                    </div>
                    
                </div>
                <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Number of Inverters</label>
                        
                        <input type="text" name="number_of_inverter" class="form-control" value="{{$machine->number_of_inverter}}">
                       
                    </div>
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">SNMP Status</label>
                      
                      <input type="text" name="snmp_status" class="form-control" value="{{$machine->snmp_status}}">
                     
                    </div>
                    
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Battery Brand</label>
                        
                        <input type="text" name="battery_brand" class="form-control" value="{{$machine->battery_brand}}">
                        
                    </div>
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Battery Specifications</label>
                        
                        <input type="text" name="battery_spec" class="form-control" value="{{$machine->battery_spec}}">
                        
                    </div>
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">Number of Battery</label>
                      
                      <input type="text" name="battery_qty" class="form-control" value="{{$machine->battery_qty}}">
                      
                    </div>
                    
                </div>
                <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Load</label>
                        
                        <input type="text" name="load" class="form-control" value="{{$machine->load}}">
                        
                    </div>
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">Date Deployed</label>
                      
                      <input type="text" name="date_deployed" class="form-control" value="{{$machine->date_deployed}}">
                      
                    </div>
                    
                </div>
                <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Last Battery Replaced</label>
                        
                        <input type="text" name="last_battery_replaced" class="form-control" value="{{$machine->last_battery_replaced}}">
                       
                    </div>
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">Inverter Deployed By</label>
                      
                      <input type="text" name="inverter_deployed_by" class="form-control" value="{{$machine->inverter_deployed_by}}">
                     
                    </div>
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Remarks</label>
                        <textarea name="remarks" class="form-control">{{$machine->remarks}}</textarea>
                        
                       
                      </div>
                    
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                                      
                    <input type="submit" name="submit" class="btn btn-lg btn-primary" value="Update Record">
                    <a href="/deletemachine/{{$machine->id}}" class="btn btn-lg btn-danger">Delist Machine</a>
                  </div>
                </div>
              </div>
            </form>
            
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
        
            <div class="card-header pb-0">
              <h5 class="card-title pb-2" id="history">Maintenance History</h5>
              
              <!-- Search component -->
  
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-4">
                <table class="table align-items-center mb-0" id="myTable">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date Visited</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">FSE Assigned</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Job Type</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Diagnosis</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Causes</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Recommendation</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ( $history as $rep)
                    <tr>
                      
                          
                     
                      <td>
                        
                            
                            <p class="text-xs text-secondary mb-0">{{$rep->visit_date}}</p>
                          
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$rep->fse_assigned}}</p>
                        
                      </td>
                      <td>
                          <p class="text-xs font-weight-bold mb-0">{{$rep->job_type}}</p>
                          
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">{{$rep->job_description}}</p>
                          
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">{{$rep->site_diagnosis}}</p>
                          
                        </td>
                       
                        <td>
                          <p class="text-xs font-weight-bold mb-0">{{$rep->causes_of_damage}}</p>
                          
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">{{$rep->recommendations}}</p>
                          
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
