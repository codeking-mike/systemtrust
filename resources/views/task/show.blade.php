@extends('layout2')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Edit Task</p>
              
            </div>
          </div>
          <div class="card-body">
            @if (session()->has('message'))
              
            <p class="text-success">{{session('message')}}</p>
            @endif
            <form action="/tasks/{{$task->id}}" method="post">
                @csrf
                @method('PUT')
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Client Name</label>
                    <input type="text" name="client_name" class="form-control" value="{{$task->client_name}}" />
                   
                  </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Location</label>
                      
                      <input type="text" name="location" class="form-control" value="{{$task->location}}">
                      @error('location')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Task Type</label>
                      <select name='task_type' class="form-control">
                        @php
                        if ($task->task_type == 'Fault Call'){
                        echo'
                        <option selected>Fault Call</option> 
                        <option>Relocation</option>
                        <option>Installation</option> 
                        <option>Maintenance</option> ';
                        }
                        elseif ($task->type == 'Relocation'){
                        echo '<option>Fault Call</option> 
                        <option selected>Relocation</option>
                        <option>Installation</option> 
                        <option>Maintenance</option>';
                        }  
                        elseif ($task->type == 'Installation'){
                        echo '<option selected>Fault Call</option> 
                        <option>Relocation</option>
                        <option selected>Installation</option> 
                        <option>Maintenance</option> ';
                        }else {
                          echo '  <option selected>Fault Call</option> 
                        <option>Relocation</option>
                        <option>Installation</option> 
                        <option selected>Maintenance</option> ';
                        }
                        @endphp
                        
                           
                            
                          
                       
                        
                      </select>
                     
                    </div>
                  </div>
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Description</label>
                    <textarea class="form-control" name="task_description">{{$task->task_description}}</textarea>
                   
                  </div>
                  @error('task_description')
                  <span class="text-danger">{{$message}}</span>
              @enderror
                </div>
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Assigned FSE</label>
                    <select name='fse_assigned' class="form-control">
                      @foreach ($users as $fse)
                         @if ($fse->position == 'engineer')
                              @if ($fse->alias == $task->fse_assigned)
                              <option selected>{{$task->fse_assigned}}</option>   
                              @endif
                         <option>{{$fse->alias}}</option>  
                         @endif 
                      @endforeach
                    </select>
                    
                   
                  </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="form-contol-lable">Task Status</label>
                        <select name='task_status' class="form-control">
                            @php
                            if ($task->task_status == 'in progress'){
                            echo'
                            <option selected>in progress</option> 
                            <option>completed</option>
                             ';
                            }
                            else {
                              echo '  <option>in progress</option> 
                            
                            <option selected>completed</option> ';
                            }
                            @endphp
                            
                               
                                
                              
                           
                            
                          </select>
                         
                    </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="" class="form-contol-lable">Machine Details</label>
                    <textarea name="machine_details" id="" cols="7" rows="5" class="form-control">
                      {{$task->machine_details}}
                    </textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="" class="form-contol-lable">Site Parameters</label>
                    <textarea name="site_param" id="" cols="7" rows="5" class="form-control">
                      {{$task->site_param}}
                    </textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="" class="form-contol-lable">Diagnosis</label>
                    <textarea name="diagnosis" id="" cols="7" rows="5" class="form-control">
                      {{$task->diagnosis}}
                    </textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="" class="form-contol-lable">Remarks</label>
                    <textarea name="remarks" id="" cols="7" rows="5" class="form-control">
                      {{$task->remarks}}
                    </textarea>
                  </div>
                </div>
                
                
                
                <div class="col-md-12">
                  <div class="form-group">
                                      
                    <input type="submit" name="update" class="btn btn-lg btn-danger" value="Update Task">
                  </div>
                </div>
              </div>
            </form>
        </div>
      </div>

    
   
@endsection
