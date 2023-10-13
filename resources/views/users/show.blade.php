@extends('layout2')

@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header pb-0">
          <div class="d-flex align-items-center">
            <p class="mb-0">Edit Profile</p>
            <a href="/settings/{{$emp->id}}" class="btn btn-primary btn-sm ms-auto">Change Password</a>
          </div>
        </div>
        <div class="card-body">
          @if (session()->has('message'))
              
          <p class="text-warning">{{session('message')}}</p>
          @endif
          <form action="/update/{{$emp->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          <p class="text-uppercase text-sm">User Information</p>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Fullname</label>
                <input class="form-control" type="text" name="name" value="{{$emp->name}}">
              </div>
            </div>
            <input class="form-control" type="hidden" name="alias" value="{{$emp->alias}}">
              

            
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Email address</label>
                <input class="form-control" type="email" name="email" value="{{$emp->email}}">
              </div>
            </div>
           
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Date of Birth</label>
                @unless ($emp['staff_dob'] == '')
                <input class="form-control" name="staff_dob" type="date" value="{{$emp['staff_dob']}}">
                @else
                <input class="form-control" name="staff_dob" type="date" value="">
             
                @endunless
                
              </div>
            </div>
            
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="marital_status" class="form-control-label">Marital Status</label>
                @if (empty($emp->marital_status))

                <select name="marital_status" id="marital_status" class="form-control">
                  <option>Single</option>
                  <option>Married</option>
                </select>
                  @else 
                  <input class="form-control" name="marital_status" type="text" value="{{$emp['marital_status']}}">
                @endif
                
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Wedding Anniversary</label>
                <input class="form-control" name="anniversary" type="text" value="{{$emp['anniversary']}}">
              </div>
            </div>
          </div>
          <hr class="horizontal dark">
          <p class="text-uppercase text-sm">Contact Information</p>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Address</label>
                <input class="form-control" type="text" name="addresss" value="{{$emp->address}}">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Phone number</label>
                <input class="form-control" name="phone" type="text" value="{{$emp['phone']}}">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">CUG</label>
                <input class="form-control" name="phone" type="text" value="{{$emp['cug']}}">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Employment Date</label>
                <input class="form-control" name="emp_date" type="text" value="{{$emp['emp_date']}}">
              </div>
            </div>
            
            
            
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Profile Pic</label>
                
                <input class="form-control" name="profilepic" type="file" value="">
              </div>
              
            </div>
          </div>
          <hr class="horizontal dark">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input class="btn btn-lg btn-danger" type="submit" value="Update Information">
              </div>
            </div>
          </div>
            
          </form>
          
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-profile">
       
        <img src="../assets/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
      
       
        
        <div class="row justify-content-center">
          <div class="col-4 col-lg-4 order-lg-2">
            <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
              <a href="javascript:;">
                @if ($emp->profilepic != '')
                <img src="/storage/{{$emp->profilepic}}" alt="Image placeholder"  class="rounded-circle img-fluid border border-2 border-white"> 
                @else
                <img src="../assets/img/team-2.jpg" class="rounded-circle img-fluid border border-2 border-white">
                @endif
                
              </a>
            </div>
          </div>
        </div>
        <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
          <div class="d-flex justify-content-between">
            <a href="tel:{{$emp->phone}}" class="btn btn-sm btn-info mb-0 d-none d-lg-block">Call</a>
            <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-block d-lg-none"><i class="ni ni-collection"></i></a>
            <a href="mailto:{{$emp->email}}" class="btn btn-sm btn-dark float-right mb-0 d-none d-lg-block">Send Mail</a>
            <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-block d-lg-none"><i class="ni ni-email-83"></i></a>
          </div>
        </div>
        <div class="card-body pt-0">
          <div class="row">
           
          </div>
          <div class="text-center mt-4">
            <h5>
              {{$emp->name}}<span class="font-weight-light"></span>
            </h5>
            <div class="h6 mt-4">
              <i class="ni business_briefcase-24 mr-2"></i>{{$emp->position}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--chainge pasword form-->
      
    
   
@endsection
