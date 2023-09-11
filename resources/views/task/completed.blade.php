@extends('layout2')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Completed Tasks</h6>
              <div class="d-flex align-items-center">
                
                    
                <a class=" btn btn-primary btn-sm ms-auto" href="/tasks/create">Create Task</a>
                
              
              </div>
              <div class="row">
                <div class="form-group col-md-5">
                    <div class="input-group">
                      <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                      <input type="text" id="myInput" onkeyup="searchTask()" class="form-control" placeholder="Search task by location ...">
                  
                    </div>
                </div>
                <div class="form-group col-md-5">
                  <div class="input-group">
                    <select class="form-control">
                            <option><a href="/tasks/completed/1">Last Week</a></option>
                            <a href="/tasks/completed/2"> <option selected>Last 3 Months</option></a>
                            <option><a href="/tasks/completed/3">Last 6 Months</a></option>
                            <option><a href="/tasks/completed/4">Last One year</a></option>
                    </select>
                   
                  </div>
              </div>
              </div>
             
             
            </div> 
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0" id="taskTable">
                  <thead>
                    <tr>
                      
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Task</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                      
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Location</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">FSE Assigned</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>

                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                   
                     @foreach ($task as $tsk)
                     @unless ($tsk['task_status']== 'in progress')
                     <tr>
                      <td>
                        <span class="text-xs font-weight-bold mb-0">{{$tsk['task_type']}}</span>
                        
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$tsk['task_description']}}</p>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{$tsk['location']}}</span>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{$tsk['fse_assigned']}}</span>
                      </td>
                      <td>
                        
                          
                          <span class="text-xs font-weight-bold">{{$tsk['task_status']}}</span>
                          
                      </td>
                      <td class="align-middle">
                         <a class="text-primary text-sm" href="/taskview/{{$tsk['id']}}">View Task</a>
                        
                      </td>
                    </tr>
                    @else
                    <tr><p class="text-sm font-weight-bold mb-0">No pending tasks</p></tr>
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
    
  
    
@endsection