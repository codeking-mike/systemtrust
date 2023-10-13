@extends('layout2')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-12">
        
      </div>
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">

            <x-back-card />
            
            <h6>Employees List</h6>
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
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Designation</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date Joined</th>
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
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
                      <a href="edituser/{{$emp->id}}" class="btn btn-secondary text-xs">View User</a>
                      <!--
                      <a href="/edituser/{{$emp['id']}}" class="btn btn-success" data-toggle="tooltip" data-original-title="Edit user">
                        Edit
                      </a> /  <a href="/deleteuser/{{$emp['id']}}" class="btn btn-danger" data-toggle="tooltip" data-original-title="Edit user">
                        Delete
                      </a>-->
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
    
  
    
  
    
@endsection