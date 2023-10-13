@extends('layout2')

@section('content')

<div class="container-fluid py-4">

  


      <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          
          <div class="card-header pb-2">
            <x-back-card />
            <h6 class="card-title">Select Site Below to submit report</h6>
            
            <div class="row">
              <x-search3-card />

            </div>
            <!-- Search component -->

          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0" style="max-height: 80% !important">
              <table class="table align-items-center mb-0" id="myTable">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Client Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Branch Code</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Location</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Inverter Brand / Capacity</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach ( $machines as $machine)
                  <tr>
                    
                        
                    <td>
                      <p class="text-xs font-weight-bold mb-0 text text-center">{{$machine['client_name']}}</p>
                      
                    </td>
                    <td>
                      
                          
                          <p class="text-xs text-secondary mb-0 text-center"><a href="/reports/{{$machine['id']}}/submit">{{$machine['branch_code']}}</a></p>
                       
                    </td>
                    
                      <td>
                        <p class="text-xs font-weight-bold mb-0 ">{{$machine['branch_address']}}</p>
                        
                      </td>
                     
                     
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center">{{$machine['inverter_brand']}} / {{$machine['inverter_capacity']}}</p>
                        
                      </td>
                     
                      
                     
                    
                    <td class="align-middle">
                      <a href="/jcc1/{{$machine->id}}" class="btn btn-success" data-toggle="tooltip" data-original-title="Edit Machine">
                        Submit Report
                      </a>
                    </td>
                  </tr>
                  @endforeach
                  
                  
                </tbody>
              </table>
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