@extends('master')

@section('keywords','bazil books')
@section('description','Books Books And more Books!')
@section('title','Genre List')

@section('content')



<!-- HERE IS MY CODE
@foreach($genreList as $row)
{{$row->type}}<br/>
@endforeach -->



<div class="card shadow mb-4">                          
            <div class="card-header py-3"> 
            <h1 class="h3 mb-2 text-gray-800 text-center">Genre List Information</h1>
            

            <div class="card-body">
            </div>
                 </div>
                <div class="card-body">
                <div class="table-responsive">
                                    <table class="table table-dark table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <tr>
                            <th>Gener Id</th>
                            <th>Genre Type</th>
                            
                           
                            <th>Delete</th>  
                            
                            <th>Edit</th>   
                                           
                        </tr>
                </thead>
                <tbody>
                @foreach($genreList as $row)
                        <tr>
                            <td>{{$row->genreId}}</td>
                            <td>{{$row->type}}</td>
                           
                            <td><a class = "btn btn-danger" href="">Delete</a></td>
                           
                            <td><a class="btn btn-info " href="genre-edit-{{$row->genreId}}">Edit</a></td>
                            
                        </tr>
                @endforeach      

                </tbody>
            </table>
            <br>
           
                                               <a class="btn  btn-info btn-block " href="genre">Add Genre</a>
                                              
            </div>
        </div>
    </div>
  
</div>







@endsection
