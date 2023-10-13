@extends('layout2')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Pending Expenses</h6>
              <div class="d-flex align-items-center">
                @if (auth()->user()->role != 'admin')
                  <a class=" btn btn-primary btn-sm ms-auto" href="/expenses/create">Submit Expenses</a>
                
                 @else
                 <a class=" btn btn-success btn-sm ms-auto" href="/expenses/processed">Mark All as Processed</a>
                 <a class=" btn btn-primary btn-sm ms-auto" href="/expenses/create">Submit Expenses</a>
                 <a class="btn btn-danger btn-sm " href="/exportexpenses">Export Expenses</a>
                @endif
                
              
              </div>
             
            </div> 
            <div class="card-body px-0 pt-0 pb-2">
              @if (session()->has('message'))
              
              <p class="text-danger">{{session('message')}}</p>
              @endif
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">

                  @if (auth()->user()->role != 'admin')
                  <thead>
                    <tr>
                      
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Expense Date</th>
                      
                     
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Amount</th>
                      

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
                         <a class=" btn btn-success btn-sm" href="/showexpense/{{$expense['id']}}">View/Edit</a> /

                        <a class=" btn btn-danger btn-sm" href="/deleteexpense/{{$expense['id']}}">Delete</a>
                      </td>
                    </tr>
                   
                    @endforeach
                                           
                  </tbody>

                  @else
                  <thead>
                    <tr>
                      
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Staff Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Expense Date</th>
                      
                     
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Amount</th>
                      

                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                   
                     @foreach ($expenses as $expense)
                    
                     <tr>
                      <td>
                        <span class="text-xs font-weight-bold mb-0">{{$expense['staff_name']}}</span>
                        
                      </td>
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
                        <a class=" btn btn-success btn-sm" href="/showexpense/{{$expense['id']}}">View/Edit</a> /

                       <a class=" btn btn-danger btn-sm" href="/deleteexpense/{{$expense['id']}}">Delete</a>
                     </td>
                    </tr>
                   
                    @endforeach
                                                  
                       
                            
                      
                   
                    
                    
                       
                     
                       
                    
                      
                  </tbody>

                  @endif
                  
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  
    
@endsection