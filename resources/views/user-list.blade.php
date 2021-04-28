@extends('master')

@section('keywords','bazil books')
@section('description','Books Books And more Books')
@section('title','User List')


@section('content')
       
        <div class="card shadow mb-4">                          
            <div class="card-header py-3"> 
            <h1 class="h3 mb-2 text-gray-800 text-center">User List Information</h1>
            

            <div class="card-body">
            </div>
                 </div>
                <div class="card-body">
                <div class="table-responsive">
                                    <table class="table table-dark table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <tr>               
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>User Name</th>
                            <th>Privilege</th> 
                            @if(Auth::user()->userPrivilegeId==1)
                            <th>Delete</th>  
                            
                            <th>Edit</th>   
                            @endIf                    
                        </tr>
                </thead>
                <tbody>
                    @foreach($userList as $row)
                        <tr>        
                            <td>{{$row->fName}}</td>
                            <td>{{$row->lName}}</td>
                            <td>{{$row->username}}</td>
                            <td>{{$row->userHasPrivilege->privilege}}</td>
                            @if(Auth::user()->userPrivilegeId==1)
                            <td><a class = "btn btn-danger" href="user-edit-{{$row->userId}}">Delete</a></td>
                           
                            <td><a class="btn btn-info " href="user-edit-{{$row->userId}}">Edit</a></td>
                            @endIf
                        </tr>
                        @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

@endsection

