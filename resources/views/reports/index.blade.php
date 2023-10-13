@extends('layout2')

@section('content')

<div class="container-fluid p-4 ">

 


      <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header">
            <h5 class="card-title">
              Submit report for site
            </h5>
            <p class="card-text">
              Select available sites below and fill in your report or submit other report here <a href="reports/other" class="btn btn-secondary">Submit Report</a>
            </p>
          </div>
         
          <div class="card-body px-3 pt-1 pb-2">
             <!-- Site stats components -->
  <div class="row">
    
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
       
      <a href="/reports/nonsolar">
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
        <a href="/reports/solar">
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
        <a href="/reports/ups">
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
          <div class="card-footer">
            <div class="row tex-muted">
             
             
            </div>
           
          </div>
        </div>
      </div>
    </div>
    
    
    
    
@endsection