@extends('layout2')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Search Site History</p>
              
            </div>
          </div>
          <div class="card-body">
           
            <form action="/sitehistory" method="get">
                @csrf
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" class="form-control-lable">Branch Code</label>
                        <input type="text" name="branch_code" class="form-control">

                    </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                                      
                    <input type="submit" name="submit" class="btn btn-lg btn-danger" value="Search">
                  </div>
                </div>
              </div>
            </form>
              
            
           
            
            
            
           
            
          </div>
        </div>
      </div>
    
   
@endsection
