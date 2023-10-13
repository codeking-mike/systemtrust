@extends('layout2')

@section('content')

<div class="container-fluid py-4">
   <!-- Site stats components -->
   <div class="row" style="margin-bottom: 20px">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
      <a href="/viewmachines/{{$client->client_name}}">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Non Solar Sites</p>
                <h5 class="font-weight-bolder">
                 {{$nonsolar}}
                   
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
        <a href="/viewmachines2/{{$client->client_name}}">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Solar Sites</p>
                <h5 class="font-weight-bolder">
                  {{$solar}}
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
        <a href="/viewmachines3/{{$client->client_name}}">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">UPS Sites</p>
                <h5 class="font-weight-bolder">
                  {{$ups}}
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

  </div>
    <div class="row">
      <div class="col-md-12 m-3">
        <div class="card mb-4 p-4">
          <div class="card-header pb-0" >
            <x-back-card />
            <h6>Client Name: {{$client->client_name}}</h6>
           
          </div>
          <div class="card-body px-0 pt-0 pb-2">
           
            <x-flash-message />
            <form action="/clients/{{$client->id}}" method="post">
                @csrf
                @method('PUT')
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Client Name</label>
                    <input type="text" name="client_name" class="form-control" value="{{$client->client_name}}">
                   
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Client Type</label>
                      <input type="text" name="client_type" class="form-control" value="{{$client->client_type}}">
                   
                    
                     
                    </div>
                  </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Address</label>
                      
                      <input type="text" name="client_location" class="form-control" value="{{$client->client_location}}">
                     
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Phone number</label>
                      <input type="text" name="contact_phone" class="form-control" value="{{$client->contact_phone}}">
                     
                    </div>
                   
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Email Address</label>
                      <input type="text" name="contact_email" class="form-control" value="{{$client->contact_email}}">
                     
                    </div>
                   
                  </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Solution</label>
                    <textarea class="form-control" name="solution">{{$client->solution}}</textarea>
                   
                  </div>
                 
                </div>
                
                
                
                
                
                
                <div class="col-md-5">
                  <div class="form-group">
                                      
                    <input type="submit" name="submit" class="btn btn-lg btn-danger" value="Update Information">
                  </div>
                </div>
              </div>
            </form>
               
             
        </div>
      </div>
    </div>
    
      </div>
    
    
@endsection