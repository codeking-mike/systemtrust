@extends('layout')

@section('content')
<main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-md-6 text-center">
           
            </div>
          </div>
          <div class="row">
           
            <div class="col-xl-6 col-lg-6 col-md-6 d-flex flex-column mx-lg-0 mx-auto">
                <div class="card card-plain" x-data="">

                 <!-- X-data-->
            <div class="row col-md-6" x-data="{open: false, name: 'Mike' }">
                <button class="btn btn-danger" x-on:click="open = !open"
                x-bind:class="!open ? 'btn-danger' : 'btn-success'">Toggle</button>
                <!-- x-show-->
                <div x-show="open" x-transition style="display: none" class="alert alert-success text-white">
                  <p>Programing with Laravel and Alpine.JS</p>
                  <!-- x-text-->
                  <h5 x-text="name"></h5>
                </div>
                <button class="btn" x-on:click="open = !open" x-bind:class="open ? 'btn-success' : 'btn-danger'">Alert</button>
            

                <!-- x-effect: used to execute scripts -->
                <div x-effect="alert(open)"></div>
            </div>

                
                
                    
                   
                
                
                </div>
              <div class="card card-plain">
                
                
                    
                   
                
                
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection