@extends('layout2')

@section('content')

<div class="container-fluid py-4">

  <!-- Site stats components -->
  


      <div class="row mb-30">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <x-back-card />
            <h4>Add Site</h4>
            
            <div class="row">
                <div class="col-md-3">
                    <a href="/solarmachines/create" class="btn btn-primary btn-sm ms-auto btn-lg">Add Solar Site</a>
                </div>
                <div class="col-md-3">
                    <a href="/machine/create" class="btn btn-warning btn-sm ms-auto btn-lg">Add Non-Solar Site</a>
                </div>
                <div class="col-md-3">
                    <a href="/ups/create" class="btn btn-danger btn-sm ms-auto btn-lg">Add UPS Site</a>
                </div>

            </div>
            <!-- Search component -->

          </div>
          <div class="card-body px-0 pt-0 pb-2">
            
          </div>
          
        </div>
      </div>
    </div>
    
    
    
    
@endsection