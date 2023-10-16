@extends('layout2')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <x-back-card />
            <div class="d-flex align-items-center">
              <p class="mb-0">Create Notice</p>
              
            </div>
          </div>
          <div class="card-body">
            <x-flash-message />
            <form action="/notice" method="post">
                @csrf
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Receiver</label>
                    <select name='receiver' class="form-control">
                      @foreach ($users as $user)
                         
                         <option>{{$user->alias}}</option>  
                        
                      @endforeach
                      <option selected>all</option>
                      
                    </select>
                   
                  </div>
                </div>
                <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">Messaage</label>
                      <textarea name="message" id="" cols="30" rows="10" class="form-control"></textarea>
                      
                      
                    </div>
                    
                      
                      <input type="hidden" name="sender" value="{{auth()->user()->name}}" class="form-control">
                      
                   
                  </div>
                  
                
                
                
                
                <input type='hidden' name='status' value='0' />
                
                
                
                <div class="col-md-12">
                  <div class="form-group">
                                      
                    <input type="submit" name="submit" class="btn btn-lg btn-danger" value="Post Notice">
                  </div>
                </div>
              </div>
            </form>
              
            
           
            
            
            
           
            
          </div>
        </div>
      </div>
    
   
@endsection
