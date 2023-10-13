@extends('layout2')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <p class="mb-0">Update Expense</p>
              
            </div>
          </div>
          <div class="card-body">
            @if (session()->has('message'))
              
            <p class="text-success">{{session('message')}}</p>
            @endif
            <form action="/expenses/{{$expenses->id}}" method="post">
                @csrf
                @method('PUT')
              <div class="row">
               
                <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Expense Date</label>
                      
                      <input type="text" name="expense_date" class="form-control" value="{{$expenses->expense_date}}" >
                      @error('expense_date')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Amount</label>
                      <input type="text" name="amount" class="form-control" value="{{$expenses->amount}}">
                      @error('daily_total')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                     
                    </div>
                  </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Expense Description</label>
                    <textarea class="form-control" name="description">{{$expenses->description}}</textarea>
                   
                  </div>
                  @error('description')
                  <span class="text-danger">{{$message}}</span>
              @enderror
                </div>
                
                
                <input type='hidden' name='status' value='pending' />
                
                
                
                <div class="col-md-12">
                  <div class="form-group">
                                      
                    <input type="submit" name="submit" class="btn btn-lg btn-danger" value="Update Expense">
                  </div>
                </div>
              </div>
            </form>
              
            
           
            
            
            
           
            
          </div>
        </div>
      </div>
    
   
@endsection
