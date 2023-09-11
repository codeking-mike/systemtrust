@extends('layout2')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Add Machine</p>
              
            </div>
          </div>
          <div class="card-body">
           
            <form action="/solarmachines" method="post">
                @csrf
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="form-control-lable">Branch Code</label>
                        <input type="text" name="branch_code" class="form-control">

                    </div>
                </div>
                <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">BM Name</label>
                        
                        <input type="text" name="bm_name" class="form-control">
                        @error('bm_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">BM Number</label>
                      
                      <input type="text" name="bm_number" class="form-control">
                      @error('bm_number')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    
                </div>
                <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Branch Location</label>
                        
                        <input type="text" name="branch_address" class="form-control">
                        @error('branch_address')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">State</label>
                      
                      <input type="text" name="branch_state" class="form-control">
                      @error('branch_state')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">FSE</label>
                      <select name='fse_assigned' class="form-control">
                        @foreach ($users as $fse)
                           @if ($fse->job_description == 'engineer')
                           <option>{{$fse->name}}</option>  
                           @endif 
                        @endforeach
                      </select>
                     
                    </div>
                  </div>

                  <input type="hidden" name="remarks" value="nil" />

                  <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Inverter Brand</label>
                        
                        <input type="text" name="inverter_brand" class="form-control">
                        @error('inverter_brand')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">Inverter Capacity</label>
                      
                      <input type="text" name="inverter_capacity" class="form-control">
                      @error('inverter_capacity')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">SNMP Status</label>
                        
                        <select name='snmp_status' class="form-control">
                         
                          <option>Unavailable</option>  
                             <option>Available</option>  
                            
                        </select>
                       
                      </div>
                </div>
                <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Number of Inverters</label>
                        
                        <input type="text" name="number_of_inverter" class="form-control">
                        @error('number_of_inverter')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                   
                    
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Battery Specifications</label>
                        
                        <input type="text" name="battery_spec" class="form-control">
                        @error('battery_spec')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Number of Battery</label>
                        
                        <input type="text" name="battery_qty" class="form-control">
                        @error('battery_qty')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Battery Brand</label>
                        
                        <input type="text" name="battery_brand" class="form-control">
                        @error('battery_brand')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                    
                    
                </div>
                <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Number of ATMs</label>
                        
                        <input type="text" name="number_of_atms" class="form-control">
                        
                    </div>
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">Solar Panel Type</label>
                      
                      <input type="text" name="solarpanel_type" class="form-control">
                      @error('date_deployed')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    
                </div>
                <div class="col-md-12 row">
                    <div class="form-group col-md-4">
                        <label for="example-text-input" class="form-control-label">Solar Panel Capacity</label>
                        
                        <input type="text" name="solarpanel_capacity" class="form-control">
                        
                    </div>
                    <div class="form-group col-md-4">
                        <label for="example-text-input" class="form-control-label">Solar Panel Number</label>
                        
                        <input type="text" name="solarpanel_number" class="form-control">
                        
                    </div>
                    <div class="form-group col-md-4">
                      <label for="example-text-input" class="form-control-label">Charge Controller</label>
                      
                      <input type="text" name="charge_controller" class="form-control">
                     
                    </div>
                    
                </div>
                <div class="col-md-12 row">
                    
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Date Inverter Deployed</label>
                        
                        <input type="text" name="date_inverter_deployed" class="form-control">
                        
                    </div>
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">Inverter Age</label>
                      
                      <input type="text" name="inverter_age" class="form-control">
                     
                    </div>
                    
                </div>
                <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Last Battery Replaced</label>
                        
                        <input type="text" name="last_battery_replaced" class="form-control">
                        
                    </div>
                    <div class="form-group col-md-4">
                        <label for="example-text-input" class="form-control-label">Inverter Deployed By</label>
                        
                        <input type="text" name="inverter_deployed_by" class="form-control">
                        
                    </div>
                    
                    
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                                      
                    <input type="submit" name="submit" class="btn btn-lg btn-danger" value="Add Machine">
                  </div>
                </div>
              </div>
            </form>
              
            
           
            
            
            
           
            
          </div>
        </div>
      </div>
    
   
@endsection
