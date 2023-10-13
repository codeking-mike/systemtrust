@extends('layout2')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <x-back-card />
            <div class="card-header pb-0">
              <h6>Leave History</h6>
              
             
            </div> 
            <div class="card-body px-0 pt-0 pb-2">
             
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">

                  @if (auth()->user()->role != 'admin')
                  <thead>
                    <tr>
                      
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Leave Type</th>
                      
                     
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reason</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Start Date</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">End Date</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                   
                     @foreach ($myleaves as $leave)
                    
                     <tr>
                     
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$leave->leave_type}}</p>
                      </td>
                     
                      <td>
                        <span class="text-xs font-weight-bold">{{$leave->reason}}</span>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{$leave->fromdate}}</span>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{$leave->todate}}</span>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{$leave->status}}</span>
                      </td>
                
                    </tr>
                   
                    @endforeach
                                           
                  </tbody>

                  @else
                  <thead>
                    <tr>
                      
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Leave Type</th>
                      
                     
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reason</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Start Date</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">End Date</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                        
                      
                    </tr>
                  </thead>
                  <tbody>
                   
                     @foreach ($leaves as $leave)
                    
                     <tr>
                      <td>
                        <span class="text-xs font-weight-bold mb-0">{{$leave->staff_name}}</span>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$leave->leave_type}}</p>
                      </td>
                     
                      <td>
                        <span class="text-xs font-weight-bold">{{$leave->reason}}</span>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{$leave->fromdate}}</span>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{$leave->todate}}</span>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{$leave->status}}</span>
                      </td>
                    </tr>
                   
                    @endforeach
                                                  
                       
                            
                      
                   
                    
                    
                       
                     
                       
                    
                      
                  </tbody>

                  @endif
                  
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  
    
@endsection