@extends('layout2')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Edit JCC Report for Branch: {{$report->branch_code}}</p>
              
            </div>
          </div>
          <div class="card-body">
            @if (session()->has('message'))
              
            <p class="text-success">{{session('message')}}</p>
            @endif
            <form action="/reports/{{$report->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="row">
               
                  
               
                <div class="col-md-12 row">
                  <div class="form-group col-md-6">
                    <label for="example-text-input" class="form-control-label">Client Name</label>
                    <input type="text" name="client_namae" class="form-control" value="{{$report->client_name}}" readonly>
                   
                  </div>
                    <div class="form-group col-md-6">
                        <label for="" class="form-control-lable">Branch Code</label>
                        <input type="text" name="branch_code" class="form-control" value="{{$report->branch_code}}" readonly>
                      
                    </div>
                </div>
                <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Client Rep Name</label>
                        
                        <input type="text" name="clientrep_name" class="form-control" value="{{$report->clientrep_name}}" readonly>
                       
                    </div>
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">Client Rep Number</label>
                      
                      <input type="text" name="clientrep_number" class="form-control" value="{{$report->clientrep_number}}" readonly>
                     
                    </div>
                    
                </div>
                <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Location</label>
                        
                        <input type="text" name="site_address" class="form-control" value="{{$report->site_address}}" readonly>
                        
                    </div>
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">State</label>
                      
                      <input type="text" name="site_state" class="form-control" value="{{$report->site_state}}">
                    
                    </div>
                    
                </div>
               
                  <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Job Description</label>
                        
                        <input type="text" name="job_description" class="form-control" value="{{$report->job_description}}" readonly>
                       
                    </div>
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">Date Visited</label>
                      
                      <input type="text" name="visit_date" class="form-control" value="{{$report->visit_date}}">
                      
                    </div>
                    
                </div>
                <div class="col-md-12 row">
                    <div class="form-group col-md-4">
                        <label for="example-text-input" class="form-control-label">Machine Type</label>
                        <input type="text" name="equipment_type" class="form-control" value="{{$report->equipment_type}}">
                        
                    </div>
                    <div class="form-group col-md-4">
                      <label for="example-text-input" class="form-control-label">Machine Brand</label>
                      
                    <input type="tex" name='equipment_brand' class="form-control" value="{{$report->equipment_brand}}">
                       
                        
                     
                    </div>
                    <div class="form-group col-md-4">
                      <label for="example-text-input" class="form-control-label">Machine Capacity</label>
                      
                    <input type="tex" name='equipment_capacity' class="form-control" value="{{$report->equipment_capacity}}">
                       
                        
                     
                    </div>
                    
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Seria No</label>
                        
                        <input type="text" name="serial_no" class="form-control" value="{{$report->serial_no}}">
                       
                    </div>
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Date Installed</label>
                        
                        <input type="text" name="date_installed" class="form-control" value="{{$report->date_installed}}">
                        
                    </div>
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">SNMP STATUS</label>
                      
                      <select name="snmp_status" class="form-control">
                      <option>available</option>
                      

                      </select>
                    </div>
                    
                </div>
                <div class="col-md-12 row">
                  <div class="form-group col-md-4">
                    <label for="example-text-input" class="form-control-label">Battery Specification</label>
                    
                    <input type="text" name="battery_spec" class="form-control" value="{{$report->battery_spec}}">
                   
                  </div>
                  <div class="form-group col-md-4">
                    <label for="example-text-input" class="form-control-label">Battery Quantity</label>
                    
                    <input type="text" name="battery_qty" class="form-control" value="{{$report->battery_qty}}">
                   
                   </div>
                    <div class="form-group col-md-4">
                        <label for="example-text-input" class="form-control-label">Battery Brand</label>
                        
                        <input type="text" name="battery_brand" class="form-control" value="{{$report->battery_brand}}">
                       
                    </div>
                    
                 
                    
                    
                </div>
                <div class="col-md-12 row">
                  <div class="form-group col-md-4">
                      <label for="example-text-input" class="form-control-label">MSD Voltage</label>
                      
                      <input type="text" name="msd_voltage" class="form-control" value="{{$report->msd_voltage}}">
                     
                  </div>
                  <div class="form-group col-md-4">
                    <label for="example-text-input" class="form-control-label">Float Voltage</label>
                    
                    <input type="text" name="float_voltage" class="form-control" value="{{$report->float_voltage}}">
                   
                </div>
                <div class="form-group col-md-4">
                  <label for="example-text-input" class="form-control-label">Charging Amps</label>
                  
                  <input type="text" name="charging_amps" class="form-control" value="{{$report->charging_amps}}">
                 
              </div>
              <div class="col-md-12">
                <div class="col-md-6">
                  <label for="" class="form-control-label">Last Battery Replaced</label>
                 <input type="text" class="form-control" name="last_battery_replaced" value="{{$report->last_battery_replaced}}">
                </div>
              </div>
              <div class="col-md-12 row">
                <div class="form-group col-md-4">
                    <label for="example-text-input" class="form-control-label">Backup Time</label>
                    
                    <input type="text" name="backup_time" class="form-control" value="{{$report->backup_time}}">
                   
                </div>
                <div class="form-group col-md-4">
                  <label for="example-text-input" class="form-control-label">Gen Run Time</label>
                  
                  <input type="text" name="genrun_time" class="form-control" value="{{$report->genrun_time}}">
                 
              </div>
              <div class="form-group col-md-4">
                <label for="example-text-input" class="form-control-label">PHCN Run Time</label>
                
                <input type="text" name="phcnrun_time" class="form-control" value="{{$report->phcnrun_time}}">
               
            </div>
                
                
            </div>
                  
                  
              
                <div class="col-md-12 row">
                    <div class="form-group col-md-4">
                        <label for="example-text-input" class="form-control-label">Load Description</label>
                        
                        <input type="text" name="load_description" class="form-control" value="{{$report->load_description}}">
                        
                    </div>
                    <div class="form-group col-md-4">
                      <label for="example-text-input" class="form-control-label">Site Input Voltage</label>
                      
                      <input type="text" name="siteinput_voltage" class="form-control" value="{{$report->siteinput_voltage}}">
                     
                    </div>
                    <div class="form-group col-md-4">
                      <label for="example-text-input" class="form-control-label">Site Output Voltage</label>
                      
                      <input type="text" name="siteoutput_voltage" class="form-control" value="{{$report->siteouput_voltage}}">
                     
                    </div>
                    
                </div>
                <div class="col-md-12 row">
                  <div class="form-group col-md-4">
                      <label for="example-text-input" class="form-control-label">Site Frequency</label>
                      
                      <input type="text" name="site_frequency" class="form-control" value="{{$report->site_frequency}}">
                      
                  </div>
                  <div class="form-group col-md-4">
                    <label for="example-text-input" class="form-control-label">AVR Brand</label>
                    
                    <input type="text" name="avr_brand" class="form-control" value="{{$report->avr_brand}}">
                   
                  </div>
                  <div class="form-group col-md-4">
                    <label for="example-text-input" class="form-control-label">AVR Capacity</label>
                    
                    <input type="text" name="avr_capacity" class="form-control" value="{{$report->avr_capacity}}">
                   
                  </div>
                  
              </div>
              <div class="col-md-12">
                <div class="form-group col-md-8">
                  <label for="" class="form-control-label">Site Diagnosis</label>
                   <textarea name="site_diagnosis" class="form-control" id="" cols="10" rows="5">{{$report->site_diagnosis}}</textarea>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group col-md-8">
                  <label for="" class="form-control-label">Causes of Damage</label>
                   <textarea name="causes_of_damage" class="form-control" id="" cols="10" rows="5">{{$report->causes_of_damage}}</textarea>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group col-md-8">
                  <label for="" class="form-control-label">Recommendations</label>
                   <textarea name="recommendations" class="form-control" id="" cols="10" rows="5">{{$report->recommendations}}</textarea>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group col-md-8">
                  <label for="" class="form-control-label">Battery Voltage Readings</label>
                   <textarea name="battery_voltage_reading" class="form-control" id="" cols="10" rows="5">{{$report->battery_voltage_reading}}</textarea>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">JCC</label>
                    
                    <div class="col-md-4">
                        <div class="card">
                          <img class="card-img-top" src="/storage/{{$report->jcc}}" alt="">
                        </div>
                      </div>
                   
                  </div>
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Upload ERF</label>
                    <div class="col-md-4">
                        <div class="card">
                          <img class="card-img-top" src="/storage/{{$report->erf}}" alt="">
                        </div>
                      </div>
                   
                  </div>
              </div>
                <div class="col-md-12">
                  <div class="form-group">
                                      
                    <input type="submit" name="submit" class="btn btn-lg btn-danger" value="Update">
                  </div>
                </div>
              </div>
            </form>
              
            
           
            
            
            
           
            
          </div>
        </div>
      </div>
    
   
@endsection
