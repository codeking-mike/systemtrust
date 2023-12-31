@extends('layout2')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Update Machine</p>
              
            </div>
          </div>
          <div class="card-body">
            @if (session()->has('message'))
              
            <p class="text-success">{{session('message')}}</p>
            @endif
            <form action="/solarmachines/{{$machine->id}}" method="post">
                @csrf
                @method('PUT')
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="form-control-lable">Branch Code</label>
                        <input type="text" name="branch_code" class="form-control" value="{{$machine->branch_code}}">

                    </div>
                </div>
                <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">BM Name</label>
                        
                        <input type="text" name="bm_name" class="form-control" value="{{$machine->bm_name}}" >
                        
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
                <div class="col-md-12">
                    <div class="form-group col-md-5">
                        <input type="text" name="fse_assigned" class="form-control" value="{{$machine->fse_assigned}}" readonly>
                        
                    </div>
                    
                </div>
                
                

                  <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Inverter Brand</label>
                        
                        <input type="text" name="inverter_brand" class="form-control" value="{{$machine->inverter_brand}}">
                       
                    </div>
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">Inverter Capacity</label>
                      
                      <input type="text" name="inverter_capacity" class="form-control" value="{{$machine->inverter_capacity}}">
                      @error('inverter_capacity')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">SNMP Status</label>
                        
                        <select name='snmp_status' class="form-control">
                         @if ($machine->snmp_status=='Unavailable')
                         <option selected>Unavailable</option>  
                         <option>Available</option> 
                         @else
                         <option>Unavailable</option>  
                         <option selected> Available</option>  
                         @endif
                          
                            
                        </select>
                       
                      </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">Battery Specifications</label>
                      
                      <input type="text" name="battery_spec" class="form-control" value="{{$machine->battery_spec}}">
                      @error('battery_spec')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">Number of Battery</label>
                      
                      <input type="text" name="battery_qty" class="form-control" value="{{$machine->battery_qty}}">
                      @error('battery_qty')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">Battery Brand</label>
                      
                      <input type="text" name="battery_brand" class="form-control" value="{{$machine->battery_brand}}">
                      @error('battery_brand')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                  
                  
                  
              </div>
                <div class="col-md-12 row">
                  <div class="form-group col-md-5">
                    <label for="example-text-input" class="form-control-label">Number of ATMs</label>
                    
                    <input type="text" name="number_of_atms" class="form-control" value="{{$machine->number_of_atms}}">
                    
                    </div>
                </div>
                <div class="col-md-12 row">
                   
                  <div class="form-group col-md-5">
                    <label for="example-text-input" class="form-control-label">Solar Panel Type</label>
                    
                    <input type="text" name="solarpanel_type" class="form-control" value="{{$machine->solarpanel_type}}">
                    
                  </div>
                  
              </div>
              <div class="col-md-12 row">
                  <div class="form-group col-md-4">
                      <label for="example-text-input" class="form-control-label">Solar Panel Capacity</label>
                      
                      <input type="text" name="solarpanel_capacity" class="form-control" value="{{$machine->solarpanel_capacity}}">
                      
                  </div>
                  <div class="form-group col-md-4">
                      <label for="example-text-input" class="form-control-label">Solar Panel Number</label>
                      
                      <input type="text" name="solarpanel_number" class="form-control" value="{{$machine->solarpanel_number}}">
                      
                  </div>
                  <div class="form-group col-md-4">
                    <label for="example-text-input" class="form-control-label">Charge Controller</label>
                    
                    <input type="text" name="charge_controller" class="form-control" value="{{$machine->charge_controller}}">
                   
                  </div>
                  
              </div>
                <div class="col-md-12">
                  <div class="form-group col-md-5">
                    <label for="example-text-input" class="form-control-label">Number of Inverters</label>
                    
                    <input type="text" name="number_of_inverter" class="form-control" value="{{$machine->number_of_inverter}}">
                    @error('number_of_inverter')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                </div>
                    
                   
                    
                
               
                
                <div class="col-md-12 row">
                    
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Date Inverter Deployed</label>
                        
                        <input type="text" name="date_inverter_deployed" class="form-control" value="{{$machine->date_inverter_deployed}}">
                        
                    </div>
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">Inverter Age</label>
                      
                      <input type="text" name="inverter_age" class="form-control" value="{{$machine->inverter_age}}">
                     
                    </div>
                    
                </div>
                <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Last Battery Replaced</label>
                        
                        <input type="text" name="last_battery_replaced" class="form-control" value="{{$machine->last_battery_replaced}}">
                        
                    </div>
                    <div class="form-group col-md-4">
                        <label for="example-text-input" class="form-control-label">Inverter Deployed By</label>
                        
                        <input type="text" name="inverter_deployed_by" class="form-control" value="{{$machine->inverter_deployed_by}}">
                        
                    </div>
                    
                    
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Remarks</label>
                    <textarea name="remarks" id="" cols="10" rows="5" class="form-control">
                        {{$machine->remarks}}
                    </textarea>
                  </div>
                </div>
               
                <div class="col-md-12">
                  <div class="form-group">
                                      
                    <input type="submit" name="submit" class="btn btn-lg btn-primary" value="Update Machine">
                    <a href="/deletesolar/{{$machine->id}}" class="btn btn-lg btn-danger">Delist Machine</a>
                  </div>
                </div>
              </div>
            </form>
              
            
           
            
            
            
           
            
          </div>
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
