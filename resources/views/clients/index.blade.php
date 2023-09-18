@extends('layout2')

@section('content')

<div class="container-fluid py-4">
  <div class="row" style="margin-bottom: 20px">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
      
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Home Users</p>
                <h5 class="font-weight-bolder">
                 {{$home}}
                   
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
      
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Corporate Customers</p>
                <h5 class="font-weight-bolder">
                  {{$corp}}
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
  </div>
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Clients Table</h6>
            <div class="d-flex align-items-center">
                
                <a href="/clients/create" class="btn btn-primary btn-sm ms-auto">Add Client</a>
              </div>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            @if (session()->has('message'))
              
            <p class="text-danger">{{session('message')}}</p>
            @endif
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Client Name</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Solution</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach ( $clients as $client)
                  <tr>
                    
                        
                   
                    <td>
                      <div class="d-flex px-2 py-1">
                        
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$client['client_name']}}</h6>
                          
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0">{{$client->client_type}}</p>
                      
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0">{{$client->solution}}</p>
                      
                    </td>
                    
                    <td class="align-middle">
                      <a href="/viewclient/{{$client['id']}}" class="btn btn-success btn-sm" data-toggle="tooltip" data-original-title="View Client">
                        View Client
                      </a> / 
                      <a href="/deleteclient/{{$client['id']}}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete Client">
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
            
            <h4 class="card-title">Add Client</h4>
          </div>
          <hr class="horizontal dark my-1">
          <div class="card-body pt-sm-3 pt-0 overflow-auto">
            <form action="" method="post">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Client Name</label>
                  
                  <input type="text" name="client" class="form-control">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Contact Phone</label>
                  
                  <input type="text" name="phone" class="form-control">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Contact Email</label>
                  
                  <input type="text" name="email" class="form-control">
                </div>
              </div>
              
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Inverter Size</label>
                  
                  <input type="text" name="solution" class="form-control">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Client Address</label>
                  
                  <input type="text" name="solution" class="form-control">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                                    
                  <input type="submit" name="submit" class="btn btn-lg btn-danger" value="Add Client">
                </div>
              </div>
            </div>
          </form>
            
           
            
            
            
           
            
          </div>
        </div>
      </div>
    
    
@endsection