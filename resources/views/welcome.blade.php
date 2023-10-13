@extends('layout')

@section('content')
<main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-md-6 text-center">
            <img src="assets/img/systemtrust_logo.png" width="200" />
            </div>
          </div>
          <div class="row">
            
            <div class="col-xl-8 col-lg-8 col-md-8 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Sign In</h4>
                  
                  <p class="mb-0">Enter your email and password to sign in</p>
                </div>
                <div class="card-body">
                 <x-flash-message />
                  <form role="form" action="/users/authenticate" method="post">
                    @csrf
                    <div class="mb-3">
                      <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email" value="{{old('email')}}" required>
                      @error('email')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                    </div>
                    <div class="mb-3">
                      <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" value="{{old('password')}}" required>
                    </div>
                    
                    <div class="text-center">
                      <button type="submit" name="login" class="btn btn-lg btn-danger btn-lg w-100 mt-4 mb-0">Sign in</button>
                    </div>
                  </form>
                </div>
                
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