@extends('layout2')

@section('content')

<div class="container-fluid p-4 ">

  <!-- Site stats components -->
 


      <div class="row">
      <div class="col-12">
        <div class="card mb-4">
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