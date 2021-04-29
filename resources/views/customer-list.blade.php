@extends('master')

@section('keywords','bazil books')
@section('description','Books Books And more Books!')
@section('title','Customer List')

@section('content')



<!-- HERE IS MY CODE
@foreach($customerList as $row)
{{$row->customerName}}<br/>
@endforeach -->

<div class="card shadow mb-4">                          
            <div class="card-header py-3"> 
            <h1 class="h3 mb-2 text-gray-800 text-center">Customer List Information</h1>
            

            <div class="card-body">
            </div>
                 </div>
                <div class="card-body">
                <div class="table-responsive">
                                    <table class="table table-dark table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <tr>
                            <th>Customer Id</th>
                            <th>Customer Name</th>
                            <th>Customer Phone</th>
                            <th>Customer Email</th>
                            <th>Customer Address</th> 
                            @if(Auth::user()->userPrivilegeId==1)  
                            <th>Delete</th>  
                            @endif
                            <th>Edit</th>   
                                           
                        </tr>
                </thead>
                <tbody>
                @foreach($customerList as $row)
                        <tr>
                            <td>{{$row->customerId}}</td>
                            <td>{{$row->customerName}}</td>
                            <td>{{$row->customerPhone}}</td>
                            <td>{{$row->customerEmail}}</td>
                            <td>{{$row->customerAddress}}</td>
                            @if(Auth::user()->userPrivilegeId==1)  
                            <td><a class = "btn btn-danger" href="customer-edit-{{$row->customerId}}">Delete</a></td>
                           @endif
                            <td><a class="btn btn-info " href="customer-edit-{{$row->customerId}}">Edit</a></td>
                            
                        </tr>
                @endforeach      

                </tbody>
            </table>
            <br>
           
                                               <a class="btn  btn-info btn-block " href="customer">Add Customer</a>
                                              
            </div>
        </div>
    </div>
  
</div>







@endsection