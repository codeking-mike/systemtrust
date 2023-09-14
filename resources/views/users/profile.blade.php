@extends('layout2')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Edit Profile</p>
              <a href="/user/settings" class="fixed-plugin-button btn btn-primary btn-sm ms-auto">Change Password</a>
            </div>
          </div>
          <div class="card-body">
            @if (session()->has('message'))
              
            <p class="text-warning">{{session('message')}}</p>
            @endif
            <form action="/update/{{$emp->id}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
            <div class="row">
              
             
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Fullname</label>
                  <input class="form-control" name="name" type="text" value="{{$emp['name']}}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Email address</label>
                  <input class="form-control" name="email" type="email" value="{{$emp->email}}">
                 
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Date of Birth</label>
                  @unless ($emp['staff_dob'] == '')
                  <input class="form-control" name="staff_dob" type="text" value="{{$emp['staff_dob']}}">
                  @else
                  <input class="form-control" name="staff_dob" type="date" value="">
               
                  @endunless
                  
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Phone number</label>
                  <input class="form-control" name="phone" type="text" value="{{$emp['phone']}}">
                </div>
              </div>

            </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Marital Status</label>
                    <input class="form-control" name="marital_status" type="text" value="{{$emp['marital_status']}}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Address</label>
                    <input class="form-control" name="address" type="text" value="{{$emp['address']}}">
                  </div>
                </div>
              </div>
              
            
            <hr class="horizontal dark">
            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Profile Pic</label>
                  
                  <input class="form-control" name="profilepic" type="file" value="">
                </div>
                <div class="col-md-4">
                  <div class="card">
                    <img class="card-img-top" src="/storage/{{$emp->profilepic}}" alt="">
                  </div>
                </div>
                
              </div>
            </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="btn btn-lg btn-danger" type="submit" value="Update Information">
                    <a href="/users" class="text-primary">&laquo;&laquo;Back</a>
                  </div>
                </div>
              </div>
              
             
              
            
           
          </div>
        </form>
        </div>

        
      </div>
    </div>

        
  </div>
<!--chainge pasword form-->
      
    
   
@endsection
