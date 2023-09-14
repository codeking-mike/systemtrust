@extends('layout2')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Submit Report</p>
              
            </div>
          </div>
          <div class="card-body">
            @if (session()->has('message'))
              
            <p class="text-success">{{session('message')}}</p>
            @endif
            <form action="/tasks/{{$task->id}}/report" method="post" enctype="multipart/form-data">
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
                      <label for="example-text-input" class="form-control-label">Remarks/Observation/Recommendation</label>
                      <textarea class="form-control" name="remarks">{{$task->remarks}}</textarea>
                     
                    </div>
                    @error('task_description')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                  </div>
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Upload JCC</label>
                    <input type="file" name="jcc" class="form-control" value=""  />
                    <div class="col-md-4">
                        <div class="card">
                          <img class="card-img-top" src="/storage/{{$task->jcc}}" alt="">
                        </div>
                      </div>
                   
                  </div>
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Upload ERF</label>
                    <input type="file" name="erf" class="form-control" />
                    <div class="col-md-4">
                        <div class="card">
                          <img class="card-img-top" src="/storage/{{$task->erf}}" alt="">
                        </div>
                      </div>
                   
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
                                      
                    <input type="submit" name="update" class="btn btn-lg btn-danger" value="Submit Report">
                  </div>
                </div>
              </div>
            </form>
        </div>
      </div>

    
   
@endsection
