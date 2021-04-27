@extends('master')

@section('keywords','bazil books')
@section('description','Books Books And more Books!')
@section('title','Payment List')

@section('content')



<!-- HERE IS MY CODE
@foreach($paymentList as $row)
{{$row->Type}}<br/>
@endforeach -->



<div class="card shadow mb-4">                          
            <div class="card-header py-3"> 
            <h1 class="h3 mb-2 text-gray-800 text-center">Payment List Information</h1>
            

            <div class="card-body">
            </div>
                 </div>
                <div class="card-body">
                <div class="table-responsive">
                                    <table class="table table-dark table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <tr>
                            <th>Payment Id</th>
                            <th>Payment Type</th>
                            
                           
                            <th>Delete</th>  
                            
                            <th>Edit</th>   
                                           
                        </tr>
                </thead>
                <tbody>
                @foreach($paymentList as $row)
                        <tr>
                            <td>{{$row->PaymentId}}</td>
                            <td>{{$row->Type}}</td>
                           
                            <td><a class = "btn btn-danger" href="">Delete</a></td>
                           
                            <td><a class="btn btn-info " href="payment-edit-{{$row->PaymentId}}">Edit</a></td>
                            
                        </tr>
                @endforeach      

                </tbody>
            </table>
            <br>
           
                                               <a class="btn  btn-info btn-block " href="payment">Add Payment</a>
                                              
            </div>
        </div>
    </div>
  
</div>







@endsection