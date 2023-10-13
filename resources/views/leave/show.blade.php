@extends('layout2')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header pb-0">
            <x-back-card />
            <div class="d-flex align-items-center">
              <p class="mb-0">Update Leave Request</p>
              
            </div>
          </div>
          <div class="card-body">
            @if (session()->has('message'))
              
            <p class="text-success">{{session('message')}}</p>
            @endif
            <form action="/leaves/{{$leave->id}}" method="post">
                @csrf
                @method('PUT')
              <div class="row">
                @if (auth()->user()->role == 'admin')
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Staff Name</label>
                        
                        <input type="date" name="staff_name" class="form-control" value="{{$leave->staff_name}}">
                        @error('fromdate')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div> 
                </div>
                @endif
                <div class="col-md-12 row">
                    <div class="form-group col-md-5">
                      <label for="example-text-input" class="form-control-label">From Date</label>
                      
                      <input type="date" name="fromdate" class="form-control" value="{{$leave->fromdate}}">
                      @error('fromdate')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="form-group col-md-5">
                        <label for="example-text-input" class="form-control-label">To Date</label>
                        <input type="date" name="todate" class="form-control" value="{{$leave->todate}}">
                        @error('fromdate')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>
                  </div>
                 
                  
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Reason</label>
                    <textarea class="form-control" name="reason" cols="12" rows="7" >{{$leave->reason}}</textarea>
                   
                  </div>
                  @error('reason')
                  <span class="text-danger">{{$message}}</span>
              @enderror
                </div>
               
                @if (auth()->user()->role == 'admin')
                    
    
                <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Status</label>
                      <select name="status" id="" class="form-control">
                        @if ($leave->status == 'pending')
                        <option>approved</option>
                        <option>denied</option>
                        <option selected>pending</option>
                        @else
                        <option selected>approved</option>
                        <option>denied</option>
                        <option>pending</option>
                        @endif
    
                      </select>
                
                     
                    </div>
                   
                  </div>
                  @else
                  <input type="hidden" name="status" value="{{$leave->status}}" />
                  <input type="hidden" name="staff_name" value="{{auth()->user()->name}}">
                  @endif
                
                
                <div class="col-md-12">
                  <div class="form-group">
                                      
                    <input type="submit" name="submit" class="btn btn-lg btn-danger" value="Update">
                  </div>
                </div>
              </div>
            </form>
              
           
        </div>
      </div>
    
   
@endsection
