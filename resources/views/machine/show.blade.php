@extends('layout2')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Edit Machine</p>
              
            </div>
          </div>
          <div class="card-body">
            
            <form action="/machine/update" method="post">
                @csrf
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
                      
                      <input type="text" name="branch_state" class="form-control" value="{{$machine->branch_code}}">
                      
                    </div>
                    
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">FSE</label>
                      <input type="text" name="fse_assigned" class="form-control" value="{{$machine->fse_assigned}}">
                
                     
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
                                      
                    <input type="submit" name="submit" class="btn btn-lg btn-danger" value="Update Record">
                  </div>
                </div>
              </div>
            </form>
            
        </div>
      </div>

    
   
@endsection
