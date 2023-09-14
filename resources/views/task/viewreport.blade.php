@extends('layout2')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">View Report</p>
              
            </div>
          </div>
          <div class="card-body">
           
            
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Client Name</label>
                    <input type="text" name="client_name" class="form-control" value="{{$task->client_name}}" readonly />
                   
                  </div>
                </div>
                
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Task Type</label>
                      <input type="text" class="form-control" value="{{$task->task_type}}" readonly>
                     
                    </div>
                  </div>
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Description</label>
                    <textarea class="form-control" name="task_description" readonly>{{$task->task_description}}</textarea>
                   
                  </div>
                 
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Remarks/Observation/Recommendation</label>
                      <textarea class="form-control" name="remarks" readonly>{{$task->remarks}}</textarea>
                     
                    </div>
                    
                  </div>
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">JCC</label>
                    
                    <div class="col-md-4">
                        <div class="card">
                          <img class="card-img-top" src="/storage/{{$task->jcc}}" alt="">
                        </div>
                      </div>
                   
                  </div>
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Upload ERF</label>
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
                        <input type="text" class="form-control" value="{{$task->task_status}}">
                         
                    </div>
                </div>
                
                
                
                
                
              </div>
            
        </div>
      </div>

    
   
@endsection
