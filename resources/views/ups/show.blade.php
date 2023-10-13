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
            @if (session()->has('message'))
              
            <p class="text-success">{{session('message')}}</p>
            @endif
            <form action="/ups/{{$ups->id}}" method="post">
                @csrf
                @method('PUT')
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="form-control-lable">Branch Code</label>
                        <input type="text" name="branch_code" class="form-control" value="{{$ups->branch_code}}">

                    </div>
                </div>
                <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">BM Name</label>
                        
                        <input type="text" name="bm_name" class="form-control" value="{{$ups->bm_name}}">
                        
                    </div>
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">BM Number</label>
                      
                      <input type="text" name="bm_number" class="form-control" value="{{$ups->bm_number}}" >
                     
                    </div>
                    
                </div>
                <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Branch Location</label>
                        
                        <input type="text" name="branch_address" class="form-control" value="{{$ups->branch_address}}">
                       
                    </div>
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">State</label>
                      
                      <input type="text" name="branch_state" class="form-control" value="{{$ups->branch_state}}">
                      
                    </div>
                    
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-5">
                        <input type="text" name="fse_assigned" class="form-control" value="{{$ups->fse_assigned}}">
                        <input type="hidden" name="remarks" value="nil" />
                    </div>
                    
                </div>
                

                  <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">UPS Brand</label>
                        
                        <input type="text" name="ups_brand" class="form-control" value="{{$ups->ups_brand}}">
                       
                    </div>
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">UPS Capacity</label>
                      
                      <input type="text" name="ups_capacity" class="form-control" value="{{$ups->ups_capacity}}">
                      @error('inverter_capacity')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">SNMP Status</label>
                        
                        <select name='snmp_status' class="form-control">
                         @if ($ups->snmp_status=='Unavailable')
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
                        
                        <input type="text" name="battery_capacity" class="form-control" value="{{$ups->battery_capacity}}">
                        @error('battery_spec')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Number of Battery</label>
                        
                        <input type="text" name="number_of_batteries" class="form-control" value="{{$ups->number_of_batteries}}">
                        @error('battery_qty')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Battery Brand</label>
                        
                        <input type="text" name="battery_brand" class="form-control" value="{{$ups->battery_brand}}">
                        @error('battery_brand')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                    
                    
                </div>
                <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">Load</label>
                        
                        <input type="text" name="load" class="form-control" value="{{$ups->load}}">
                        
                    </div>
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">Installation Year</label>
                      
                      <input type="text" name="year_of_installation" class="form-control" value="{{$ups->year_of_installation}}">
                      
                    </div>
                    
                </div>
                <div class="col-md-12 row">
                    <div class="form-group col-md-4">
                        <label for="example-text-input" class="form-control-label">Serial number</label>
                        
                        <input type="text" name="serial_number" class="form-control" value="{{$ups->serial_number}}">
                        
                    </div>
                    
                    
                    
                </div>
                
               <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Remarks</label>
                    <textarea name="remarks" id="" cols="10" rows="5" class="form-control">{{$ups->remarks}}</textarea>    
                 
                </div>
               </div>
                <div class="col-md-12">
                  <div class="form-group">
                                      
                    <input type="submit" name="submit" class="btn btn-lg btn-danger" value="Update UPS">
                    <a href="/deleteups/{{$ups->id}}" class="btn btn-lg btn-danger">Delist Machine</a>
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
