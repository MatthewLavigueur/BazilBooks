@extends('master')

@section('keywords','bazil books')
@section('description','Books Books And more Books!')
@section('title','Books List')

@section('content')



<!-- HERE IS MY CODE
@foreach($booksList as $row)
{{$row->title}}<br/>
@endforeach -->


<div class="card shadow mb-4">                          
            <div class="card-header py-3"> 
            <h1 class="h3 mb-2 text-gray-800 text-center ">Books List Information</h1>
            

            <div class="card-body">
            </div>
                 </div>
                <div class="card-body">
                <div class="table-responsive">
                                    <table class="table table-dark table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Genre</th>
                            <th>Hardcover</th>
                            <th>Paperback</th>
                            <th>In-Stock</th>
                            <th>Publisher</th>
                            <th>Price</th>
                            @if(Auth::user()->userPrivilegeId==2)  
                            <th>Delete</th>  
                            @endif
                            <th>Edit</th>   
                                           
                        </tr>
                </thead>
                <tbody>
                @foreach($booksList as $row)
                        <tr>
                            <td>{{$row->title}}</td>
                            <td>{{$row->booksHasAuthor->authorName}}</td>
                            <td>{{$row->booksHasGenre->type}}</td>
                            <td>{{$row->hardCover}}</td>
                            <td>{{$row->paperBack}}</td>
                            <td>{{$row->inStock}}</td>
                            <td>{{$row->booksHasPublisher->publisherName}}</td>
                            <td>${{$row->bookPrice}}</td>
                            @if(Auth::user()->userPrivilegeId==2)  
                            <td><a class = "btn btn-danger" href="">Delete</a></td>
                           @endif
                            <td><a class="btn btn-info " href="books-edit-{{$row->BooksId}}">Edit</a></td>
                            
                        </tr>
                @endforeach      

                </tbody>
            </table>
            <br>
           
                                               <a class="btn  btn-info btn-block " href="books">Add Books</a>
                                              
            </div>
        </div>
    </div>
  
</div>




@endsection