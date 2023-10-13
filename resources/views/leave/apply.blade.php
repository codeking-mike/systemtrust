@extends('layout2')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <x-back-card />
            <div class="d-flex align-items-center">
              <p class="mb-0">Request for Leave</p>
              
            </div>
          </div>
          <div class="card-body">
            @if (session()->has('message'))
              
            <p class="text-success">{{session('message')}}</p>
            @endif
            <form action="/leaves" method="post">
                @csrf
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Leave Type</label>
                      <select name="leave_type" id="" class="form-control">
                        <option>Sick Leave</option>
                        <option>Casual Leave</option>
                        <option>Annual Leave</option>
                      </select>
                
                     
                    </div>
                   
                  </div>
                <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">From Date</label>
                      <input type="hidden" name="staff_name" value="{{auth()->user()->name}}">
                      <input type="date" name="fromdate" class="form-control">
                      @error('fromdate')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">To Date</label>
                        <input type="date" name="todate" class="form-control">
                        @error('fromdate')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                  </div>
                 
                  
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Reason</label>
                    <textarea class="form-control" name="reason" cols="12" rows="7" ></textarea>
                   
                  </div>
                  @error('reason')
                  <span class="text-danger">{{$message}}</span>
              @enderror
                </div>
               
                
                <input type='hidden' name='status' value='pending' />
                
                
                
                <div class="col-md-12">
                  <div class="form-group">
                                      
                    <input type="submit" name="submit" class="btn btn-lg btn-danger" value="Apply">
                  </div>
                </div>
              </div>
            </form>
              
           
        </div>
      </div>
    
   
@endsection
