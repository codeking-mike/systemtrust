@extends('layout2')

@section('content')

<div class="container-fluid p-4 ">

 


      <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header">
            <h5 class="card-title">
              Submit report for site
            </h5>
            <p class="card-text">
              Select available site and fill your report or submit other report here <a href="reports/other" class="btn btn-secondary">Submit Report</a>
            </p>
          </div>
          <div class="card-header pb-0">
            <h5>View Job Completion Reports</h5>
            <div class="d-flex align-items-center">
                
                

                @if (auth()->user()->role != 'admin')
                <a href="/reports/jcc" class="btn btn-success btn-sm ms-auto">Submit JCC Report</a>
                <a href="/reports/job" class="btn btn-danger btn-sm">Job Reports</a>

                @else
                <a href="/tasks/completed" class="btn btn-danger btn-sm ms-auto">Task Reports</a>
                @endif

               
            </div>
            <div class="row">
              <x-search-card />

            </div>
            <!-- Search component -->

          </div>
          <div class="card-body px-3 pt-1 pb-2">
             <!-- Site stats components -->
  <div class="row" style="margin-bottom: 20px">
    
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
       
      
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Non Solar Sites</p>
                <h5 class="font-weight-bolder">
                 {{$nonsolar}}
                   
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
        <a href="/solarmachines">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Solar Sites</p>
                <h5 class="font-weight-bolder">
                  {{$solar}}
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
      </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <a href="/ups">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">UPS Sites</p>
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
      </a>
      </div>
    </div>
  </div>
            @if (session()->has('message'))
              
            <p class="text-danger">{{session('message')}}</p>
            @endif
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0" id="myTable">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Branch Code</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Site Address/State</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Job Type</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Machine Details</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date Installed</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">FSE Assigned</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Battery Details</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Last Battery Replaced</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Load Description</th>

                   
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach ( $reports as $rs)
                  <tr>
                    
                        
                   
                    <td>
                      
                        
                        
                          
                          <p class="text-xs text-danger font-weight-bold mb-0">{{$rs['branch_code']}}</p>
                        
                    
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0">{{$rs->site_address}} - {{$rs->site_state}}</p>
                      
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">{{$rs->job_type}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$rs->equipment_capacity}} {{$rs->equipment_brand}} {{$rs->equipment_type}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$rs->date_installed}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$rs->fse_assigned}}</p>
                        
                      </td>
                     
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$rs->battery_qty}} {{$rs->battery_brand}} {{$rs->battery_spec}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$rs->last_battery_replaced}}</p>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$rs->load_description}}</p>
                        
                      </td>
                     
                    
                    <td class="align-middle">
                      <a href="/editreport/{{$rs['id']}}" class="btn btn-success btn-sm" data-toggle="tooltip" data-original-title="Edit Machine">
                        Edit
                      </a>
                      <a href="/deletereport/{{$rs['id']}}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Edit Machine">
                        Delete
                      </a>
                    </td>
                  </tr>
                  @endforeach
                  
                  
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer">
            <div class="row tex-muted">
              <p class="card-text">
                {{$reports->links()}}
              </p>
             
            </div>
           
          </div>
        </div>
      </div>
    </div>
    
    
    
    
@endsection