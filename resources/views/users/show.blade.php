@extends('layout2')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Edit Profile</p>
              <button class="fixed-plugin-button btn btn-primary btn-sm ms-auto">Change Password</button>
            </div>
          </div>
          <div class="card-body">
            <p class="text-uppercase text-sm">User Information</p>
            <form action="" method="" enctype="multipart/form-data">
            <div class="row">
              
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Email address</label>
                  <input class="form-control" type="email" value="{{$emp->email}}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Fullname</label>
                  <input class="form-control" type="text" value="{{$emp['name']}}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Date of Birth</label>
                  @unless ($emp['staff_dob'] == '')
                  <input class="form-control" type="text" value="{{$emp['staff_dob']}}">
                  @else
                  <input class="form-control" type="date" value="">
               
                  @endunless
                  
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Phone number</label>
                  <input class="form-control" type="text" value="{{$emp['staff_phone']}}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Marital Status</label>
                  <input class="form-control" type="text" value="{{$emp['marital_status']}}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Address</label>
                  <input class="form-control" type="text" value="{{$emp['address']}}">
                </div>
              </div>
            
            <hr class="horizontal dark">
            
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Job Description</label>
                  <input class="form-control" type="text" value="{{$emp['job_description']}}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Department</label>
                  <input class="form-control" type="text" value="{{$emp['staff_department']}}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Profile Pic</label>
                  
                  <input class="form-control" type="file" value="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input class="btn btn-lg btn-danger" type="submit" value="Update Information">
                  <a href="/users" class="text-primary">&laquo;&laquo;Back</a>
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
