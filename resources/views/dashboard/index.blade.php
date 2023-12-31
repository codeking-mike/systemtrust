@extends('layout2')

@section('content')
 <x-flash-message />
    <!-- End Navbar -->
    <div class="container-fluid py-4">
       <!-- Site stats components -->
    
   @if (auth()->user()->role == 'admin')

   <div class="row" style="margin-bottom: 20px">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
      <a href="/users">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Employees</p>
                <h5 class="font-weight-bolder">
                 {{$total}}
                   
                </h5>
                
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <a href="#">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Present</p>
                <h5 class="font-weight-bolder">
                  {{$present}}
                </h5>
                
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <a href="#">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Absent</p>
                <h5 class="font-weight-bolder">
                  @php
                      $absent = $total - $present
                  @endphp
                  {{$absent}}
                </h5>
                
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <a href="/tasks">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Pending Tasks</p>
                <h5 class="font-weight-bolder">
                 
                  {{$tasks}}
                </h5>
                
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
      </div>
    </div>
  </div>

  @else
       <!-- Site stats components -->
       <div class="row" style="margin-bottom: 20px">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
          
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">My Sites</p>
                    <h5 class="font-weight-bolder">
                     {{$mysolar + $mynonsolar + $myups}}
                       
                    </h5>
                    
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
         
          </div>
        </div>
       
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <a href="/tasks/list">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">My Tasks</p>
                    <h5 class="font-weight-bolder">
                     
                      {{$mytasks}}
                    </h5>
                    
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <a href="/expenses">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">My Expenses</p>
                    <h5 class="font-weight-bolder">
                     
                      {{$myexpenses}}
                    </h5>
                    
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </a>
          </div>
        </div>
      </div>

      @endif
       
        <div class="row mt-4">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">
                Attendance
              </h5>
              <p class="card-text">Use the buttons below to check-in and out</p>
            </div>
            <div class="card-body row p-3">
              @if (session()->has('message'))
              
            <p class="text-success">{{session('message')}}</p>
            @endif
            @if (session()->has('error'))
              
            <p class="text-warning">{{session('error')}}</p>
            @endif
              <form action="/attendance/checkin" method="post" class="col-md-4 " style="max-width: 50%;padding:0px">
                @csrf
                <input type="hidden" name="staff_name" value="{{auth()->user()->name}}" />
                <input type="hidden" name="att_date" value="{{date('Y-m-d')}}" />
                <input type="hidden" name="time_in" value="{{date('h:i a')}}" />
              <button class="btn btn-primary" type="submit">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>Check-in
              </button>
              @foreach($employees as $ckin)
              @if($ckin->staff_name == auth()->user()->name)
            
            <div class="card-body p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <i class="ni ni-mobile-button text-white opacity-10"></i>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Checked-in</h6>
                      <span class="text-xs">{{$ckin->att_date}} <span class="font-weight-bold">{{$ckin->time_in}}</span></span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                  </div>
                </li>

              </ul>
            </div>
           
              </form>
              <form action="/attendance/{{$ckin->id}}" method="post" class="col-md-4" style="max-width: 50%;padding:0px">
                @csrf
                @method('PUT')
                
                <input type="hidden" name="time_out" value="{{date('h:i a')}}" />
                <button class="btn btn-danger" type="submit">
                  <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>Check-out
                </button>
                </form>
                @endif
                @endforeach

            </div>
            
            

          </div>
          
          
        </div>
        <div class="row mt-4">
       @if (auth()->user()->role == 'admin')
           
        
          <div class="row">
            <div class="col-md-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  <h6>Todays Attendance</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employee</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Time-in</th>
                          
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Time-Out</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($todayAttendance as $employee)
                            
                      
                        <tr>
                          <td>
                            <div class="d-flex px-2 py-1">
                              
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{$employee->staff_name }}</h6>
                                
                              </div>
                            </div>
                          </td>
                          <td>
                           
                            <p class="text-xs font-weight-bold mb-0">{{$employee->time_in }}</p>
                            
                          </td>
                          <td>
                            @php
                                
                            @endphp
                            <p class="text-xs font-weight-bold mb-0">{{$employee->time_out }}</p>
                            
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
          <div class="row mt-4">
            <div class="col-md-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  <h5 class="card-title">Notice Board</h5>
                  
                 
                </div> 
                <div class="card-body p-5">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center justify-content-center mb-0">
                      <thead>
                        <tr>
                          
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sender</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Message</th>
                          
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                       
                         @foreach ($notifications as $msg)
                        
                         <tr>
                          <td>
                            <span class="text-xs font-weight-bold mb-0">{{$msg->sender}}</span>
                            
                          </td>
                          <td>
                            <p class="text-xs font-weight-bold mb-0">{{$msg->message}}</p>
                          </td>
                          <td>
                            <span class="text-xs font-weight-bold">{{$msg->message_time}}</span>
                          </td>
                        
                         
                        </tr>
                        
                        
                        @endforeach
                                                      
                           
                                
                          
                       
                        
                        
                           
                         
                           
                        
                      <tr><a href="/notifications" class="btn btn-info">View All</a></tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
     @else
     <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Co-Workers</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employee</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Time-in</th>
                    
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Time-Out</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach ($todayAttendance as $employee)
                      
                
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$employee->staff_name }}</h6>
                          
                        </div>
                      </div>
                    </td>
                    <td>
                     
                      <p class="text-xs font-weight-bold mb-0">{{$employee->time_in }}</p>
                      
                    </td>
                    <td>
                      @php
                          
                      @endphp
                      <p class="text-xs font-weight-bold mb-0">{{$employee->time_out }}</p>
                      
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
          <div class="row">
            <div class="col-md-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  <h6>Notice Board</h6>
                  
                 
                </div> 
                <div class="card-body">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center justify-content-center mb-0">
                      <thead>
                        <tr>
                          
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sender</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Message</th>
                          
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                       
                         @foreach ($notifications as $msg)
                        
                         <tr>
                          <td>
                            <span class="text-xs font-weight-bold mb-0">{{$msg->sender}}</span>
                            
                          </td>
                          <td>
                            <p class="text-xs font-weight-bold mb-0">{{$msg->message}}</p>
                          </td>
                          <td>
                            <span class="text-xs font-weight-bold">{{$msg->message_time}}</span>
                          </td>
                        
                         
                        </tr>
                        
                        
                        @endforeach
                                                      
                           
                                
                          
                       
                        
                        
                           
                         
                           
                        
                      <tr><a href="/notifications" class="btn btn-info">View All</a></tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endif 
        </div>
@endsection