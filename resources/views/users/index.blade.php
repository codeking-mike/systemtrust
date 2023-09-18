@extends('layout2')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Employees Table</h6>
            <div class="d-flex align-items-center">
                
              <a class="btn btn-primary btn-sm ms-auto" href="/users/create">Add User</a>
            
            </div>
          

          </div>
          <div class="card-body px-0 pt-0 pb-2">
            
            @if (session()->has('message'))
              
            <p class="text-success">{{session('message')}}</p>
            @endif
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employee</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Function</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date of Birth</th>
                    <th class="text-secondary opacity-7">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ( $employees as $emp)
                  <tr>
                    
                        
                   
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          @if ($emp->profilepic == '')
                          <img src="assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1"> 
                          @else
                          <img src="storage/{{$emp['profilepic']}}" class="avatar avatar-sm me-3" alt="user1">
                          @endif
                          
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$emp['name']}}</h6>
                          <p class="text-xs text-secondary mb-0">{{$emp['email']}}</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0">{{$emp['position']}}</p>
                    </td>
                   
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{$emp['staff_dob']}}</span>
                    </td>
                    <td class="align-middle">
                      <a href="/edituser/{{$emp['id']}}" class="btn btn-success" data-toggle="tooltip" data-original-title="Edit user">
                        Edit
                      </a> /  <a href="/deleteuser/{{$emp['id']}}" class="btn btn-danger" data-toggle="tooltip" data-original-title="Edit user">
                        Delete
                      </a>
                    </td>
                  </tr>
                  @endforeach
                  
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="fixed-plugin">
        
      <div class="card shadow-lg">
        <div class="card-header pb-0 pt-3 ">
          
          <h4 class="card-title">Add Employee</h4>
        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0 overflow-auto">
          <form action="" method="post">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Employee Name</label>
                
                <input type="text" name="name" class="form-control">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label"> Phone</label>
                
                <input type="text" name="staff_phone" class="form-control">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Email</label>
                
                <input type="text" name="email" class="form-control">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Date of Birth</label>
                
                <input type="date" name="staff_dob" class="form-control">
              </div>
            </div>
            
            <div class="col-md-12">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Job Description</label>
                
                <input type="text" name="job_description" class="form-control">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Department</label>
                <select name='department' class="form-control">
                  <option>Admin</option>
                  <option>Technical</option>
                  
                </select>
               
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Role</label>
                <select name='role' class="form-control">
                  <option>owner</option>
                  <option>admin</option>
                  <option>user</option>
                </select>
               
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Password</label>
                
                <input type="text" name="password" class="form-control">
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
    </div>
  
    
  
    
@endsection