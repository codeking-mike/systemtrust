@extends('layout2')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Submit Expense</p>
              
            </div>
          </div>
          <div class="card-body">
            @if (session()->has('message'))
              
            <p class="text-success">{{session('message')}}</p>
            @endif
            <form action="/expenses" method="post">
                @csrf
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Staff Name</label>
                    <input type="text" name="staff_name" class="form-control" value="{{auth()->user()->name}}" readonly>
                   
                  </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Expense Date</label>
                      
                      <input type="date" name="expense_date" class="form-control">
                      @error('expense_date')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Expense Title</label>
                      <input type="text" name="expense_title" class="form-control">
                      @error('expense_title')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                     
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Daily Total(Enter the total amount for the day)</label>
                      <input type="text" name="daily_total" class="form-control">
                      @error('daily_total')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                     
                    </div>
                  </div>
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Expense Description(seperate each desc with a comma)</label>
                    <textarea class="form-control" name="description" cols="15" rows="10" placeholder="e.g Transport to site - N200"></textarea>
                   
                  </div>
                  @error('description')
                  <span class="text-danger">{{$message}}</span>
              @enderror
                </div>
                
                
                <input type='hidden' name='status' value='pending' />
                
                
                
                <div class="col-md-12">
                  <div class="form-group">
                                      
                    <input type="submit" name="submit" class="btn btn-lg btn-danger" value="Submit Expense">
                  </div>
                </div>
              </div>
            </form>
              
            
           
            
            
            
           
            
          </div>
        </div>
      </div>
    
   
@endsection
