@extends('layout2')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Pending Expenses</h6>
              <div class="d-flex align-items-center">
                
                <a class=" btn btn-primary btn-sm ms-auto" href="/expenses/create">Create Expenses</a>
                
              
              </div>
             
            </div> 
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Staff Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Expense Date</th>
                      
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Expense Title</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                      

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
                        <span class="text-xs font-weight-bold">{{$expense['expense_title']}}</span>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{$expense['description']}}</span>
                      </td>
                      
                      <td class="align-middle">
                         <a class="text-primary text-sm" href="/expenses/show/{{$expense['id']}}">View</a>
                        
                      </td>
                    </tr>
                   
                    @endforeach
                                                  
                       
                            
                      
                   
                    
                    
                       
                     
                       
                    
                      
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  
    
@endsection