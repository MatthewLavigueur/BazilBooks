@extends('master')

@section('keywords','bazil books')
@section('description','Books Books And more Books!')
@section('title','Author List')

@section('content')


<!-- step one check for array on page before table insert -->
<!-- HERE IS MY CODE
@foreach($authorList as $row)
{{$row->authorName}}<br/>
@endforeach
 -->



<div class="card shadow mb-4">                          
            <div class="card-header py-3"> 
            <h1 class="h3 mb-2 text-gray-800 text-center">Author List Information</h1>
            

            <div class="card-body">
            </div>
                 </div>
                <div class="card-body">
                <div class="table-responsive">
                                    <table class="table table-dark table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <tr>
                            <th>Author Id</th>
                            <th>Author Name</th>
                            <th>Author Birthday</th>
                            <th>Country</th>
                            @if(Auth::user()->userPrivilegeId==2)  
                            <th>Delete</th>  
                            @endif
                            <th>Edit</th>   
                                           
                        </tr>
                </thead>
                <tbody>
                @foreach($authorList as $row)
                        <tr>
                            <td>{{$row->authorId}}</td>
                            <td>{{$row->authorName}}</td>
                            <td>{{$row->authorBirthday}}</td>
                            <td>{{$row->authorHasCountry->country}}</td>
                            @if(Auth::user()->userPrivilegeId==2)  
                            <td><a class = "btn btn-danger" href="">Delete</a></td>
                           @endif
                            <td><a class="btn btn-info " href="author-edit-{{$row->authorId}}">Edit</a></td>
                            
                        </tr>
                @endforeach      

                </tbody>
            </table>
            <br>
           
                                               <a class="btn  btn-info btn-block " href="author">Add Author</a>
                                              
            </div>
        </div>
    </div>
  
</div>




@endsection