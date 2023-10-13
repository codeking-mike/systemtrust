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
                      <label for="example-text-input" class="form-control-label">Expense Date</label>
                      <input type="hidden" name="staff_name" value="{{auth()->user()->name}}">
                      <input type="date" name="expense_date" class="form-control">
                      @error('expense_date')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                 
                  
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Expense Description</label>
                    <textarea class="form-control" name="description" cols="12" rows="7" ></textarea>
                   
                  </div>
                  @error('description')
                  <span class="text-danger">{{$message}}</span>
              @enderror
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Amount</label>
                    <input type="text" name="amount" class="form-control">
                    @error('expense_title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                   
                  </div>
                </div>
                
                
                <input type='hidden' name='status' value='pending' />
                
                
                
                <div class="col-md-12">
                  <div class="form-group">
                                      
                    <input type="submit" name="submit" class="btn btn-lg btn-danger" value="Submit Expense">
                  </div>
                </div>
              </div>
            </form>
              
            <div class="table-responsive p-0">
              <table class="table align-items-center justify-content-center mb-0">

                
                <thead>
                  <tr>
                    
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Amount</th>

                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                 
                   @foreach ($myexpenses as $expense)
                  
                   <tr>
                   
                    <td>
                      <p class="text-xs font-weight-bold mb-0">{{$expense['expense_date']}}</p>
                    </td>
                    
                    <td>
                      <span class="text-xs font-weight-bold">{{$expense['description']}}</span>
                    </td>
                    <td>
                      <span class="text-xs font-weight-bold">{{$expense['amount']}}</span>
                    </td>
                    
                    <td class="align-middle">
                       <a class=" btn btn-success btn-sm py-1 px-2" href="/showexpense/{{$expense['id']}}">Edit</a> /

                      <a class=" btn btn-danger btn-sm py-1 px-2" href="/deleteexpense/{{$expense['id']}}">Delete</a>
                    </td>
                  </tr>
                 
                  @endforeach
                                         
                </tbody>

              </table>
           
            
            
            
           
            
          </div>
        </div>
      </div>
    
   
@endsection
