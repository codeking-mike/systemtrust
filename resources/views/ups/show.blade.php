@extends('layout2')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Update UPS</p>
              
            </div>
          </div>
          <div class="card-body">
           
            <form action="/ups/update" method="post">
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
                      
                      <input type="text" name="branch_state" class="form-control" value="{{$machine->branch_state}}">
                      
                    </div>
                    
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-5">
                        <input type="text" name="fse_assigned" class="form-control" value="{{$machine->fse_assigned}}" readonly>
                        <input type="hidden" name="remarks" value="nil" />
                    </div>
                    
                </div>
                

                  <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">UPS Brand</label>
                        
                        <input type="text" name="ups_brand" class="form-control" value="{{$machine->ups_brand}}">
                       
                    </div>
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">UPS Capacity</label>
                      
                      <input type="text" name="ups_capacity" class="form-control" value="{{$machine->ups_capacity}}">
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
                        <label for="example-text-input" class="form-control-label">Battery Capacity</label>
                        
                        <input type="text" name="battery_capacity" class="form-control" value="{{$machine->battery_capacity}}">
                        @error('battery_spec')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Number of Battery</label>
                        
                        <input type="text" name="number_of_batteries" class="form-control" value="{{$machine->number_of_batteries}}">
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
                        <label for="example-text-input" class="form-control-label">Load</label>
                        
                        <input type="text" name="load" class="form-control" value="{{$machine->load}}">
                        
                    </div>
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">Installation Year</label>
                      
                      <input type="text" name="year_of_installation" class="form-control" value="{{$machine->year_of_installation}}">
                      
                    </div>
                    
                </div>
                <div class="col-md-12 row">
                    <div class="form-group col-md-4">
                        <label for="example-text-input" class="form-control-label">Serial number</label>
                        
                        <input type="text" name="serial_number" class="form-control" value="{{$machine->serial_number}}">
                        
                    </div>
                    
                    
                    
                </div>
                
               
                <div class="col-md-12">
                  <div class="form-group">
                                      
                    <input type="submit" name="submit" class="btn btn-lg btn-danger" value="Update Machine">
                  </div>
                </div>
              </div>
            </form>
              
            
           
            
            
            
           
            
          </div>
        </div>
      </div>
    
   
@endsection
