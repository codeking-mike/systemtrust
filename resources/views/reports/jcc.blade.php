@extends('layout2')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <x-back-card />
           
              <h5 class=" card-title mb-0">Submit JCC</h5>
              
            
          </div>
          <div class="card-body">
            @if (session()->has('message'))
              
            <p class="text-success">{{session('message')}}</p>
            @endif
            <form action="/reports/create/jcc" method="post" enctype="multipart/form-data">
                @csrf
              <div class="row">
               
                  
                <h6>Client Details</h6>
                <hr>
                <div class="col-md-12 row">
                  <div class="form-group col-md-6">
                    <label for="example-text-input" class="form-control-label">Client Name</label>
                    <input type="text" name='client_name' class="form-control" value="{{$machine->client_name}}" readonly>
                     
                      
                    </select>
                   
                  </div>
                    <div class="form-group col-md-6">
                        <label for="" class="form-control-lable">Branch Code</label>
                        <input type="text" name="branch_code" class="form-control" value="{{$machine->branch_code}}" readonly>
                       
                    </div>
                </div>
                <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Client Rep Name</label>
                        
                        <input type="text" name="clientrep_name" class="form-control">
                       
                    </div>
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">Client Rep Number</label>
                      
                      <input type="text" name="clientrep_number" class="form-control">
                     
                    </div>
                    
                </div>
                <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Location</label>
                        
                        <input type="text" name="site_address" class="form-control" value="{{$machine->branch_address}}">
                        
                    </div>
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">State</label>
                      
                      <input type="text" name="site_state" class="form-control" value="{{$machine->branch_state}}" >
                      <input type='hidden' name="fse_assigned" value="{{auth()->user()->name}}" />
                    </div>
                    
                </div>
                <h6>Job Details</h6>
                <hr>
                <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">Job Type</label>
                      <select name='job_type' class="form-control">
                        <option>Fault Call</option> 
                        <option>Relocation</option>
                        <option>Installation</option> 
                        <option>Maintenance</option>  
                        <option>Battery Replacement</option> 
                      </select>
                     
                    </div>
                  </div>
                  <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Job Description</label>
                        
                        <input type="text" name="job_description" class="form-control">
                       
                    </div>
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">Date Visited</label>
                      
                      <input type="text" name="visit_date" class="form-control">
                      
                    </div>
                    
                </div>
                <h6>Machine Details</h6>
                <hr>
                <div class="col-md-12 row">
                    <div class="form-group col-md-4">
                        <label for="example-text-input" class="form-control-label">Machine Type</label>
                        
                        <select name='equipment_type' class="form-control">
                          <option selected>Inverter</option> 
                             <option>UPS</option>
                             <option>Battery</option> 
                             <option>Solar Panels</option>   
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="example-text-input" class="form-control-label">Machine Brand</label>
                      
                    <input type="tex" name='equipment_brand' class="form-control" value="{{$machine->inverter_brand}}">
                       
                      <input type="hidden" name="machine_id" value="{{$machine->id}}" />  
                     
                    </div>
                    <div class="form-group col-md-4">
                      <label for="example-text-input" class="form-control-label">Machine Capacity</label>
                      
                    <input type="tex" name='equipment_capacity' class="form-control" value="{{$machine->inverter_capacity}}">
                       
                        
                     
                    </div>
                    
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Seria No</label>
                        
                        <input type="text" name="serial_no" class="form-control">
                       
                    </div>
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Date Machine Installed</label>
                        
                        <input type="text" name="date_installed" class="form-control">
                        
                    </div>
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">SNMP STATUS</label>
                      
                      <select name="snmp_status" class="form-control">
                      <option>available</option>
                      <option selected>unavailable</option>

                      </select>
                    </div>
                    
                </div>
                <h6>Battery Parameters</h6>
                <hr>

                <div class="col-md-12 row">
                  <div class="form-group col-md-4">
                    <label for="example-text-input" class="form-control-label">Battery Specification</label>
                    
                    <input type="text" name="battery_spec" class="form-control" value="{{$machine->battery_spec}}">
                   
                  </div>
                  <div class="form-group col-md-4">
                    <label for="example-text-input" class="form-control-label">Battery Quantity</label>
                    
                    <input type="text" name="battery_qty" class="form-control" value="{{$machine->battery_qty}}">
                   
                   </div>
                    <div class="form-group col-md-4">
                        <label for="example-text-input" class="form-control-label">Battery Brand</label>
                        
                        <input type="text" name="battery_brand" class="form-control" value="{{$machine->battery_brand}}">
                       
                    </div>
                    
                 
                    
                    
                </div>
                <div class="col-md-12 row">
                  <div class="form-group col-md-4">
                      <label for="example-text-input" class="form-control-label">Measured Voltage</label>
                      
                      <input type="text" name="msd_voltage" class="form-control">
                     
                  </div>
                  <div class="form-group col-md-4">
                    <label for="example-text-input" class="form-control-label">Float Voltage</label>
                    
                    <input type="text" name="float_voltage" class="form-control">
                   
                </div>
                <div class="form-group col-md-4">
                  <label for="example-text-input" class="form-control-label">Charging Amps of Inverter</label>
                  
                  <input type="text" name="charging_amps" class="form-control">
                 
              </div>
              </div>
              <div class="col-md-12">
                <div class="col-md-6">
                  <label for="" class="form-control-label">Last Battery Replacement Date</label>
                 <input type="text" class="form-control" name="last_battery_replaced">
                </div>
                <div class="form-group col-md-6">
                  <label for="example-text-input" class="form-control-label"> Battery Backup Time</label>
                  
                  <input type="text" name="backup_time" class="form-control">
                 
              </div>
              </div>
              <hr/>
              <h6>PV Parameters</h6>
              <div class="col-md-12 row">
                <div class="col-md-4">
                  <label for="" class="form-control-label">PV Wattage</label>
                  <input type="text" class="form-control" name="pv_wattage">
                </div>
                <div class="col-md-4">
                  <label for="" class="form-control-label">PV Qauntity</label>
                  <input type="text" class="form-control" name="pv_qty">
                </div>
                <div class="col-md-4">
                  <label for="" class="form-control-label">PV Configuration</label>
                  <input type="text" class="form-control" name="pv_config">
                </div>
              </div>
              <div class="col-md-12 row">
                
                <div class="form-group col-md-4">
                  <label for="example-text-input" class="form-control-label">Gen Run Time</label>
                  
                  <input type="text" name="genrun_time" class="form-control">
                 
              </div>
              <div class="form-group col-md-4">
                <label for="example-text-input" class="form-control-label">PHCN Run Time</label>
                
                <input type="text" name="phcnrun_time" class="form-control">
               
            </div>
                
                
            </div>
                  
                
                 <h6>Site Parameters</h6> 
                 <hr /> 
                <div class="col-md-12 row">
                    <div class="form-group col-md-4">
                        <label for="example-text-input" class="form-control-label">Load Description</label>
                        
                        <input type="text" name="load_description" class="form-control">
                        
                    </div>
                    <div class="form-group col-md-4">
                      <label for="example-text-input" class="form-control-label">Site Input Voltage</label>
                      
                      <input type="text" name="siteinput_voltage" class="form-control">
                     
                    </div>
                    <div class="form-group col-md-4">
                      <label for="example-text-input" class="form-control-label">Site Output Voltage</label>
                      
                      <input type="text" name="siteoutput_voltage" class="form-control">
                     
                    </div>
                    
                </div>
                <div class="col-md-12 row">
                  <div class="form-group col-md-4">
                      <label for="example-text-input" class="form-control-label">Site Frequency</label>
                      
                      <input type="text" name="site_frequency" class="form-control">
                      
                  </div>
                  <div class="form-group col-md-4">
                    <label for="example-text-input" class="form-control-label">AVR Brand</label>
                    
                    <input type="text" name="avr_brand" class="form-control">
                   
                  </div>
                  <div class="form-group col-md-4">
                    <label for="example-text-input" class="form-control-label">AVR Capacity</label>
                    
                    <input type="text" name="avr_capacity" class="form-control">
                   
                  </div>
                  
              </div>
              <div class="col-md-12 row">
                <div class="form-group col-md-4">
                    <label for="example-text-input" class="form-control-label">Cabling</label>
                    <select name="cabling" id="" class="form-control">
                      <option>Good</option>
                      <option>Bad</option>
                    </select>
                    
                   
                    
                </div>
                <div class="form-group col-md-4">
                  <label for="example-text-input" class="form-control-label">Environs</label>
                  
                  <select name="environs" id="" class="form-control">
                    <option>Good</option>
                    <option>Bad</option>
                  </select>
                 
                </div>
                <div class="form-group col-md-4">
                  <label for="example-text-input" class="form-control-label">Surge Available?</label>
                  
                  <select name="surge" id="" class="form-control">
                    <option>Yes</option>
                    <option>No</option>
                  </select>
                 
                </div>
                
            </div>
            <h6>Diagnosis and Recommendations</h6> 
            <hr />
              <div class="col-md-12">
                <div class="form-group col-md-8">
                  <label for="" class="form-control-label">Site Diagnosis</label>
                   <textarea name="site_diagnosis" class="form-control" id="" cols="10" rows="5"></textarea>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group col-md-8">
                  <label for="" class="form-control-label">Causes of Damage</label>
                   <textarea name="causes_of_damage" class="form-control" id="" cols="10" rows="5"></textarea>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group col-md-8">
                  <label for="" class="form-control-label">Recommendations</label>
                   <textarea name="recommendations" class="form-control" id="" cols="10" rows="5"></textarea>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group col-md-8">
                  <label for="" class="form-control-label">Battery Voltage Readings</label>
                   <textarea name="battery_voltage_reading" class="form-control" id="" cols="14" rows="6"></textarea>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Upload JCC</label>
                  <input type="file" name="jcc" class="form-control" value=""  />
                  
                 
                </div>
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Upload ERF</label>
                  <input type="file" name="erf" class="form-control" />
                  
                 
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Upload Site Image</label>
                  <input type="file" name="site" class="form-control" value=""  />
                  
                 
                </div>
               
              </div>
                <div class="col-md-12">
                  <div class="form-group">
                                      
                    <input type="submit" name="submit" class="btn btn-lg btn-danger" value="Submit Report">
                  </div>
                </div>
              </div>
            </form>
              
            
           
            
            
            
           
            
          </div>
        </div>
      </div>
    
   
@endsection
