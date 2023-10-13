@extends('layout2')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Leave Request</h6>
              <div class="d-flex align-items-center">
                @if (auth()->user()->role != 'admin')
                  <a class=" btn btn-success btn-sm ms-auto" href="/leave/apply">Apply for Leave</a>
                  <a class=" btn btn-primary btn-sm" href="/leave/history">History</a>
                
                 @else
                 <a class=" btn btn-success btn-sm ms-auto" href="/leave/history">Active Leave</a>
                 <a class=" btn btn-primary btn-sm" href="/leave/apply">Apply for Leave</a>
                 <a class="btn btn-danger btn-sm " href="/exportleaves">Export Data</a>
                @endif
                
              
              </div>
             
            </div> 
            <div class="card-body px-0 pt-0 pb-2">
              @if (session()->has('message'))
              
              <p class="text-danger">{{session('message')}}</p>
              @endif
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">

                  @if (auth()->user()->role != 'admin')
                  <thead>
                    <tr>
                      
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Leave Type</th>
                      
                     
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reason</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                      

                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                      
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
                        <span class="text-xs font-weight-bold">{{$leave->status}}</span>
                      </td>
                      
                      <td class="align-middle">
                         <a class=" btn btn-success btn-sm" href="/showleave/{{$leave->id}}">View/Edit</a> /

                        <a class=" btn btn-danger btn-sm" href="/deleteleave/{{$leave->id}}">Delete</a>
                      </td>
                    </tr>
                   
                    @endforeach
                                           
                  </tbody>

                  @else
                  <thead>
                    <tr>
                      
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Staff Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Leave Type</th>
                      
                     
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reason</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Start Date</th>
                      

                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                      
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
                      
                      <td class="align-middle">
                        <a class=" btn btn-success btn-sm" href="/showleave/{{$leave->id}}">View</a> /

                       <a class=" btn btn-danger btn-sm" href="/deleteleave/{{$leave->id}}">Delete</a>
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