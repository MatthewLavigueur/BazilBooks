@extends('master')

@section('keywords','bazil books')
@section('description','Books Books And more Books!')
@section('title','Publisher List')

@section('content')



<!-- HERE IS MY CODE
@foreach($publisherList as $row)
{{$row->publisherName}}<br/>
@endforeach -->


<div class="card shadow mb-4">                          
            <div class="card-header py-3"> 
            <h1 class="h3 mb-2 text-gray-800 text-center">Publisher List Information</h1>
            

            <div class="card-body">
            </div>
                 </div>
                <div class="card-body">
                <div class="table-responsive">
                                    <table class="table table-dark table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <tr>
                            <th>Publisher Id</th>
                            <th>Publisher Name</th>
                            <th>Publisher Phone</th>
                            <th>Publisher Email</th>
                            <th>Publisher Address</th>
                            
                            <th>Delete</th>  
                            
                            <th>Edit</th>   
                                           
                        </tr>
                </thead>
                <tbody>
                @foreach($publisherList as $row)
                        <tr>
                            <td>{{$row->publisherId}}</td>
                            <td>{{$row->publisherName}}</td>
                            <td>{{$row->publisherPhone}}</td>
                            <td>{{$row->publisherEmail}}</td>
                            <td>{{$row->publisherAddress}}</td>
                           
                            <td><a class = "btn btn-danger" href="">Delete</a></td>
                           
                            <td><a class="btn btn-info " href="publisher-edit-{{$row->publisherId}}">Edit</a></td>
                            
                        </tr>
                @endforeach      

                </tbody>
            </table>
            <br>
           
                                               <a class="btn  btn-info btn-block " href="publisher">Add Publisher</a>
                                              
            </div>
        </div>
    </div>
  
</div>






@endsection