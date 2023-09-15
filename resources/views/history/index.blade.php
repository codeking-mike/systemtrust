@extends('layout2')

@section('content')

<div class="container-fluid py-4">
    <!-- Site stats components -->
  <div class="row" style="margin-bottom: 20px">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
      
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Inverters</p>
                <h5 class="font-weight-bolder">
               
                   
                 {{$nonsolar + $solar}}
                   
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
     
      </div>
    </div>
    
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">UPS</p>
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
      
      </div>
    </div>
  </div>

    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Site History - Branch Code: {{$code }}</h6>
             
             
            </div> 
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Site Address/State</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Machine Type/Brand/Capacity</th>
                      
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Last Visit</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">FSE Assigned</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Reason for Visit</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date Installed</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Number/Brand of Battery</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Last Battery Replaced</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Load Description</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Site Diagnosis</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Recommendation</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                   
                     @foreach ($reports as $report)
                     
                     <tr>
                      <td>
                        <span class="text-xs font-weight-bold mb-0">{{$report->site_address}}/{{$report->site_state}}</span>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$report->equipment_brand}}/{{$report->equipment_type}}/{{$report->equipment_capacity}}</p>
                      </td>
                      <td>
                    
                        <span class="text-xs font-weight-bold">{{$report->visit_date}}</span>
                        
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{$report->fse_assigned}}</span>
                      </td>
                      <td>
                        
                          
                          <span class="text-xs font-weight-bold">{{$report->job_type}}/{{$report->job_description}}</span>
                          
                      </td>
                      <td>
                        
                          
                        <span class="text-xs font-weight-bold">{{$report->date_installed}}</span>
                        
                    </td>
                    <td>
                        
                          
                        <span class="text-xs font-weight-bold">{{$report->battery_qty}} {{$report->battery_brand}} {{$report->battery_spec}} </span>
                        
                    </td>
                    <td>
                        
                          
                        <span class="text-xs font-weight-bold">{{$report->last_battery_replaced}}</span>
                        
                    </td>
                    <td>
                        
                          
                        <span class="text-xs font-weight-bold">{{$report->load_description}}</span>
                        
                    </td>
                    <td>
                        
                          
                        <span class="text-xs font-weight-bold">{{$report->site_diagnosis}}</span>
                        
                    </td>
                    <td>
                        
                          
                        <span class="text-xs font-weight-bold">{{$report->recommendations}}</span>
                        
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
    </div>
    
    <x-flash-message /> 
    
@endsection