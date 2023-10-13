@extends('layout2')

@section('content')

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header pb-0">
          <div class="d-flex align-items-center">
            <p class="mb-0">Edit Profile</p>
            <button class="btn btn-primary btn-sm ms-auto">Settings</button>
          </div>
        </div>
        <div class="card-body">
          <p class="text-uppercase text-sm">User Information</p>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Username</label>
                <input class="form-control" type="text" value="lucky.jesse">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Email address</label>
                <input class="form-control" type="email" value="jesse@example.com">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">First name</label>
                <input class="form-control" type="text" value="Jesse">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Last name</label>
                <input class="form-control" type="text" value="Lucky">
              </div>
            </div>
          </div>
          <hr class="horizontal dark">
          <p class="text-uppercase text-sm">Contact Information</p>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Address</label>
                <input class="form-control" type="text" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">City</label>
                <input class="form-control" type="text" value="New York">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Country</label>
                <input class="form-control" type="text" value="United States">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Postal code</label>
                <input class="form-control" type="text" value="437300">
              </div>
            </div>
          </div>
          <hr class="horizontal dark">
          <p class="text-uppercase text-sm">About me</p>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">About me</label>
                <input class="form-control" type="text" value="A beautiful Dashboard for Bootstrap 5. It is Free and Open Source.">
              </div>
            </div>
          </div>
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
                <img src="../assets/img/team-2.jpg" class="rounded-circle img-fluid border border-2 border-white">
              </a>
            </div>
          </div>
        </div>
        <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
          <div class="d-flex justify-content-between">
            <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-none d-lg-block">Connect</a>
            <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-block d-lg-none"><i class="ni ni-collection"></i></a>
            <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-none d-lg-block">Message</a>
            <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-block d-lg-none"><i class="ni ni-email-83"></i></a>
          </div>
        </div>
        <div class="card-body pt-0">
          <div class="row">
            <div class="col">
              <div class="d-flex justify-content-center">
                <div class="d-grid text-center">
                  <span class="text-lg font-weight-bolder">22</span>
                  <span class="text-sm opacity-8">Friends</span>
                </div>
                <div class="d-grid text-center mx-4">
                  <span class="text-lg font-weight-bolder">10</span>
                  <span class="text-sm opacity-8">Photos</span>
                </div>
                <div class="d-grid text-center">
                  <span class="text-lg font-weight-bolder">89</span>
                  <span class="text-sm opacity-8">Comments</span>
                </div>
              </div>
            </div>
          </div>
          <div class="text-center mt-4">
            <h5>
              Mark Davis<span class="font-weight-light">, 35</span>
            </h5>
            <div class="h6 font-weight-300">
              <i class="ni location_pin mr-2"></i>Bucharest, Romania
            </div>
            <div class="h6 mt-4">
              <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
            </div>
            <div>
              <i class="ni education_hat mr-2"></i>University of Computer Science
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <x-back-card />
            <div class="d-flex align-items-center">
              <p class="mb-0">Edit Profile</p>
              <a href="#" class="fixed-plugin-button btn btn-primary btn-sm ms-auto">Change Password</a>
            </div>
          </div>
          <div class="card-body">
            <x-flash-message />
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
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Address</label>
                    <textarea class="form-control" name="address" rows="6" cols="12">{{$emp['address']}}</textarea> 
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
      
<div class="fixed-plugin">
        
  <div class="card shadow-lg">
    <div class="card-header pb-0 pt-3 ">
      
      <h4 class="card-title">Change Password</h4>
    </div>
    <hr class="horizontal dark my-1">
    <div class="card-body pt-sm-3 pt-0 overflow-auto">
      <form action="/users/password/{{auth()->user()->id}}" method="post">
        @csrf
        @method('PUT')
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="example-text-input" class="form-control-label">New Password</label>
            
            <input type="text" name="password" class="form-control" value="{{old('password')}}">
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label for="example-text-input" class="form-control-label">Confirm Password</label>
            
            <input type="text" name="pass2" class="form-control" value="{{old('pass2')}}">
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
