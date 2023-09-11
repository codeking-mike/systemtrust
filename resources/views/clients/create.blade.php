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
           
            <form action="/clients" method="post">
                @csrf
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Client Name</label>
                    <input type="text" name="client_name" class="form-control">
                   
                  </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Client Type</label>
                      <select name='client_type' class="form-control">
                        
                           
                           <option value="corporate">Corporate</option> 
                           <option value="home">Home User</option>
                           
                          
                       
                        
                      </select>
                     
                    </div>
                  </div>
                <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Address</label>
                      
                      <input type="text" name="client_location" class="form-control">
                      @error('client_location')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Phone number</label>
                      <input type="text" name="contact_phone" class="form-control">
                     
                    </div>
                    @error('contact_phone')
                  <span class="text-danger">{{$message}}</span>
              @enderror
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Email Address</label>
                      <input type="text" name="contact_email" class="form-control">
                     
                    </div>
                    @error('contact')
                  <span class="text-danger">{{$message}}</span>
              @enderror
                  </div>
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Solution</label>
                    <textarea class="form-control" name="solution"></textarea>
                   
                  </div>
                  @error('solution')
                  <span class="text-danger">{{$message}}</span>
              @enderror
                </div>
                
                
                
                
                
                
                <div class="col-md-12">
                  <div class="form-group">
                                      
                    <input type="submit" name="submit" class="btn btn-lg btn-danger" value="Add New Client">
                  </div>
                </div>
              </div>
            </form>
              
            
           
            
            
            
           
            
          </div>
        </div>
      </div>
    
   
@endsection
