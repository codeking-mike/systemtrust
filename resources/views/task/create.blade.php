@extends('layout2')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Create Tasks</p>
              
            </div>
          </div>
          <div class="card-body">
           
            <form action="/tasks" method="post">
                @csrf
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Client Name</label>
                    <select name='client_name' class="form-control">
                      @foreach ($clients as $client)
                         
                         <option>{{$client->client_name}}</option>  
                        
                      @endforeach
                      
                    </select>
                   
                  </div>
                </div>
                <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">Location</label>
                      
                      <input type="text" name="location" class="form-control">
                      @error('location')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">Branch Code</label>
                      
                      <input type="text" name="branch_code" class="form-control">
                      @error('branch_code')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Task Type</label>
                      <select name='task_type' class="form-control">
                        
                           
                           <option>Fault Call</option> 
                           <option>Relocation</option>
                           <option>Installation</option> 
                           <option>Maintenance</option>   
                          
                       
                        
                      </select>
                     
                    </div>
                  </div>
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Description</label>
                    <textarea class="form-control" name="task_description"></textarea>
                   
                  </div>
                  @error('task_description')
                  <span class="text-danger">{{$message}}</span>
              @enderror
                </div>
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Assign FSE</label>
                    <select name='fse_assigned' class="form-control">
                      @foreach ($users as $fse)
                         @if ($fse->position == 'engineer')
                         <option>{{$fse->name}}</option>  
                         @endif 
                      @endforeach
                    </select>
                   
                  </div>
                </div>
                <input type='hidden' name='task_status' value='in progress' />
                
                
                
                <div class="col-md-12">
                  <div class="form-group">
                                      
                    <input type="submit" name="submit" class="btn btn-lg btn-danger" value="Create Task">
                  </div>
                </div>
              </div>
            </form>
              
            
           
            
            
            
           
            
          </div>
        </div>
      </div>
    
   <x-flash-message />
@endsection
