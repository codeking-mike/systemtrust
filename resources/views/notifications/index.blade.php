@extends('layout2')

@section('content')

<div class="container-fluid py-4">
   <!-- Site stats components -->
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
            <x-back-card />
          <div class="card-header pb-0">
            <a class="btn btn-success btn-sm " href="https://meet.google.com/icg-aicy-irc">Join Review Meeting</a>
            <a class="btn btn-primary btn-sm " href="https://systemtrustng.com">Visit Website</a>
            <a class="btn btn-info btn-sm " href="/notifications/create">Post Notice</a>

            <h5>Notifications</h5>
            
          </div>
          <div class="card-body">
            <div class="table-responsive p-0">
              <table class="table align-items-center justify-content-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Message</th>
                   
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sender</th>
                    
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date</th>
                    
                  </tr>
                </thead>
                <tbody>
                 
                   @foreach ($notifications as $msg)
                  
                   <tr>
                    <td>
                      <p class="text-xs font-weight-bold mb-0">{{$msg->message}}</p>
                    </td>
                    <td>
                      <span class="text-xs font-weight-bold mb-0">{{$msg->sender}}</span>
                      
                    </td>
                   
                    <td>
                      <span class="text-xs font-weight-bold">{{$msg->created_at}}</span>
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