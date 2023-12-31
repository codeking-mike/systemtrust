@extends('layout2')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <x-back-card />
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Add Machine</p>
              
            </div>
          </div>
          <div class="card-body">
           <x-flash-message />
            <form action="/ups" method="post">
                @csrf
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                      <label for="" class="form-control-lable">Client Name</label>
                      <select name='client_name' class="form-control">
                        @foreach ($clients as $client)
                          
                           <option>{{$client->client_name}}</option>  
                          
                        @endforeach
                      </select>

                  </div>
              </div>
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
                           @if ($fse->position == 'engineer')
                           <option>{{$fse->alias}}</option>  
                           @endif 
                        @endforeach
                      </select>
                     
                    </div>
                  </div>

                  <input type="hidden" name="remarks" value="nil" />

                  <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">UPS Brand</label>
                        
                        <input type="text" name="ups_brand" class="form-control">
                        @error('inverter_brand')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">UPS Capacity</label>
                      
                      <input type="text" name="ups_capacity" class="form-control">
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
                <div class="col-md-12">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Battery Capacity</label>
                        
                        <input type="text" name="battery_capacity" class="form-control">
                        @error('battery_spec')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Number of Battery</label>
                        
                        <input type="text" name="number_of_batteries" class="form-control">
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
                        <label for="example-text-input" class="form-control-label">Load</label>
                        
                        <input type="text" name="load" class="form-control">
                        @error('load')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                   
                    
                </div>
                
                <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Year of Installation</label>
                        
                        <input type="text" name="year_of_installation" class="form-control">
                        
                    </div>
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">Serial Number</label>
                      
                      <input type="text" name="serial_number" class="form-control">
                      @error('serial_number')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    
                </div>
                
                
                <div class="col-md-12">
                  <div class="form-group">
                                      
                    <input type="submit" name="submit" class="btn btn-lg btn-danger" value="Add UPS">
                  </div>
                </div>
              </div>
            </form>
              
            
           
            
            
            
           
            
          </div>
        </div>
      </div>
    
   
@endsection
