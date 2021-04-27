@extends('master')

@section('keywords','bazil books')
@section('description','Books Books And more Books!')
@section('title','Country List')

@section('content')


<!-- 
HERE IS MY CODE
@foreach($countryList as $row)
{{$row->country}}<br/>
@endforeach
 -->


<div class="card shadow mb-4">                          
            <div class="card-header py-3"> 
            <h1 class="h3 mb-2 text-gray-800 text-center">Country List Information</h1>
            

            <div class="card-body">
            </div>
                 </div>
                <div class="card-body">
                <div class="table-responsive">
                                    <table class="table table-dark table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <tr>
                            <th>Country Id</th>
                            <th>Country</th>
                            
                           
                            <th>Delete</th>  
                            
                            <th>Edit</th>   
                                           
                        </tr>
                </thead>
                <tbody>
                @foreach($countryList as $row)
                        <tr>
                            <td>{{$row->countryId}}</td>
                            <td>{{$row->country}}</td>
                           
                            <td><a class = "btn btn-danger" href="">Delete</a></td>
                           
                            <td><a class="btn btn-info " href="country-edit-{{$row->countryId}}">Edit</a></td>
                            
                        </tr>
                @endforeach      

                </tbody>
            </table>
            <br>
           
                                               <a class="btn  btn-info btn-block " href="country">Add Country</a>
                                              
            </div>
        </div>
    </div>
  
</div>






@endsection