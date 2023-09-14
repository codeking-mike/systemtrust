@extends('layout2')

@section('content')

<div class="container-fluid py-4">
   
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Attendance History</h6>
            <p class="card-text">Your attendance record for the past 3o days</p>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Time-in</th>
                    
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Time-out</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach ($attendance as $attn)
                      
                
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$attn->att_date }}</h6>
                          
                        </div>
                      </div>
                    </td>
                    <td>
                      
                      <p class="text-xs font-weight-bold mb-0">{{$attn->time_in }}</p>
                      
                    </td>
                    <td>
                      @php
                          
                      @endphp
                      <p class="text-xs font-weight-bold mb-0">{{$attn->time_out }}</p>
                      
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