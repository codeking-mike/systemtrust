@extends('layout2')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
      
      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <x-back-card />
            <div class="d-flex align-items-center">
              <h5 class="card-title p-1">Change Password</h5>
              
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm">Update your password</p>
            <form action="/users/password/{{$emp->id}}" method="post">
              @csrf
              @method('PUT')
            <div class="row">
              
              
                  
              
             
             
               
                
             
                  
                  <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Enter New Password</label>
                    
                  
                    <input class="form-control" type="text" name="password">
                    @error('password')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    
                  </div>
                  
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Confirm Password</label>
                  
                
                  <input class="form-control" type="text" name="pass2">
                  @error('password')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
                  
                </div>
                
            </div>
                  
                  
              
              
              <div class="col-md-12">
                <div class="form-group">
                                    
                  <input type="submit" name="submit" class="btn btn-lg btn-danger" value="Change Password">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    
   
@endsection

