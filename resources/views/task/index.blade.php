@extends('layout2')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Pending Tasks</h6>
              <div class="d-flex align-items-center">
                
                <a class=" btn btn-primary btn-sm ms-auto" href="/tasks/create">Create Task</a>
                <a class=" btn btn-danger btn-sm ms-auto" href="/tasks/completed">View Completed Task</a>
              
              </div>
             
            </div> 
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Task</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                      
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Location/Branch Code</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">FSE Assigned</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>

                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                   
                     @foreach ($task as $tsk)
                     @unless ($tsk['task_status']== 'completed')
                     <tr>
                      <td>
                        <span class="text-xs font-weight-bold mb-0">{{$tsk['task_type']}}</span>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$tsk['task_description']}}</p>
                      </td>
                      <td>
                        <a href="/sitehistory/{{$tsk->branch_code}}">
                        <span class="text-xs font-weight-bold">{{$tsk['location']}}/{{$tsk->branch_code}}</span>
                        </a>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{$tsk['fse_assigned']}}</span>
                      </td>
                      <td>
                        
                          
                          <span class="text-xs font-weight-bold">{{$tsk['task_status']}}</span>
                          
                      </td>
                      <td class="align-middle">
                         <a class="btn btn-success" href="/taskview/{{$tsk['id']}}">View Task</a> / 
                         <a class="btn btn-danger" href="/delete/{{$tsk['id']}}">Delete</a>
                        
                      </td>
                    </tr>
                   
                    
                    @endunless
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