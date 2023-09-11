@extends('layout2')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <x-flash-message />
      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Add New User</p>
              
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm">User Information</p>
            <form action="/users" method="post">
              @csrf
            <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                      <label for="" class="form-control-lable">Staff Name</label>
                      <input type="text" name="name" class="form-control" value="{{old('name')}}">
                      @error('name')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                  </div>
              </div>
              <div class="col-md-12 row">
                  <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">Email Address</label>
                      
                      <input type="email" name="email" class="form-control" value="{{old('email')}}">
                      @error('email')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>
                
                  <div class="form-group col-md-5">
                    <label for="example-text-input" class="form-control-label">Phone Number</label>
                    
                    <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
                    @error('phone')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div> 
                  
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Address</label>
                  <textarea name="address" id="" cols="20" rows="5" class="form-control"></textarea>
                  
                 
                </div>
              </div>

             
              <div class="col-md-12 row">
                  <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">Date of Birth</label>
                      
                      <input type="date" name="staff_dob" class="form-control">
                      
                  </div>
                  <div class="form-group col-md-5">
                    <label for="example-text-input" class="form-control-label">Marital Status</label>
                    
                    <input type="text" name="marital_status" class="form-control" value="{{old('marital_status')}}">
                    @error('marital_status')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                  
              </div>
               
                <div class="col-md-12 row">
                  <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">Position</label>
                      
                      <input type="text" name="position" class="form-control">
                     
                  </div>
                  <div class="form-group col-md-5">
                    <label for="example-text-input" class="form-control-label">Department</label>
                    
                    <input type="text" name="department" class="form-control">
                   
                  </div>
                  
              </div>
             
                  <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">Staff Role</label>
                      
                      <select name="role" class="select form-control">
                        <option>owner</option>
                        <option>admin</option>
                        <option selected>user</option>
                      </select>
                  </div> 
                  <div class="col-md-12 row">
                  <div class="form-group col-md-5">
                    <label for="example-text-input" class="form-control-label">Enter Password</label>
                    
                  
                    <input class="form-control" type="text" name="password">
                    @error('phone')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                    
                  </div>
                  
              </div>
              
                  
                  
              
              
              <div class="col-md-12">
                <div class="form-group">
                                    
                  <input type="submit" name="submit" class="btn btn-lg btn-danger" value="Add User">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
<!--chainge pasword form-->
      <div class="fixed-plugin">
        
        <div class="card shadow-lg">
          <div class="card-header pb-0 pt-3 ">
            
            <h4 class="card-title">Change Password</h4>
          </div>
          <hr class="horizontal dark my-1">
          <div class="card-body pt-sm-3 pt-0 overflow-auto">
            <form action="" method="post">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">New Password</label>
                  
                  <input type="text" name="pass" class="form-control">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Confirm Password</label>
                  
                  <input type="text" name="pass2" class="form-control">
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
      </div>
    
   
@endsection

