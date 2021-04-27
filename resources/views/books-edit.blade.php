@extends('master')

@section('keywords','bazil books')
@section('description','Books Books And more Books!')
@section('title','Add Book')

@section('content')


<div class="card shadow mb-4">                          
            <div class="card-header py-3"> 
            <h1 class="h3 mb-2 text-gray-800 text-center">Add Book</h1>          
            <div class="col-md-6">
            </div>      
                <div class="card-body">
                <div class="form-group">




                                        <!--SUCCESS-->
                                         @if(Session::has('successmsg'))

                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{Session::get('successmsg')}}</strong> 
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>


                                        @endif
                                        <!--/SUCCESS-->
                                        <!--ERROR-->
                                            @if (count($errors) > 0)
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <ul>
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                        </ul>
                                                    </div>
                                            @endif
                                        <!--/ERROR-->

                <form class="books" action="books-edit" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <input type="hidden" name="BooksId" value="{{$booksEdit->BooksId}}"/>
                
                        <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="text-gray-800"><strong>Book Title</strong></label>
                                <input class="form-control py-4 " name="title" type="text" placeholder="Book Title" value="{{$booksEdit->title}}" maxlength="100"  />
                        </div> 

                        <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="text-gray-800"><strong>Hardcover</strong></label>
                                <input class="form-control py-4 " name="hardCover" type="text" placeholder="1=yes 0=no" value="{{$booksEdit->hardCover}}" maxlength="1"  />
                        </div> 
                        <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="text-gray-800"><strong>Paperback</strong></label>
                                <input class="form-control py-4 " name="paperBack" type="text" placeholder="1=yes 0=no" value="{{$booksEdit->paperBack}}" maxlength="1"  />
                        </div> 
                        <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="text-gray-800"><strong>Instock</strong></label>
                                <input class="form-control py-4 " name="inStock" type="text" placeholder="1=yes 0=no" value="{{$booksEdit->inStock}}" maxlength="1"  />
                        </div> 
                        <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="text-gray-800"><strong>Description</strong></label>
                               <textarea class="form-control py-4" name="description" cols="10" rows="3" value="{{$booksEdit->description}}"></textarea>
                        </div> 
                        <div class="col-sm-12 mb-3 mb-sm-0">
                        @if(Auth::user()->userPrivilegeId==2)
                                <label class="text-gray-800"><strong>Book Price</strong></label>
                                <input class="form-control py-4 " name="bookPrice" type="text" placeholder="Enter Price" value="{{$booksEdit->bookPrice}}" maxlength="20"  />
                               
                                
                        @else
                                 <input class="form-control py-4 " name="bookPrice" type="hidden" placeholder="Enter Price" value="{{$booksEdit->bookPrice}}" maxlength="20"  />
                                 @endif
                        </div> 
                        <div class="col-sm-12 mb-3 mb-sm-0">

                                <label class="text-gray-800"><strong>Publisher</strong></label>
                               
                        </div> 
                        <div class="col-sm-12 mb-3 mb-sm-0">
                        <select name="publisherPublisherId" class="form-control">
                        <option value="">Select Publisher</option>
                        @foreach($publisher as $publishers)
                        <option value="{{$publishers->publisherId}}"@if($publishers->publisherId==$booksEdit->publisherPublisherId)Selected @endif>{{$publishers->publisherName}}</option>
                        @endforeach
                        </select>
                        </div> 

                        <div class="col-sm-12 mb-3 mb-sm-0">

                                <label class="text-gray-800"><strong>Genre</strong></label>
                               
                        </div> 
                        <div class="col-sm-12 mb-3 mb-sm-0">
                        <select name="genreGenreId" class="form-control">
                        <option value="">Select Genre</option>
                        @foreach($genre as $genres)
                        <option value="{{$genres->genreId}}"@if($genres->genreId==$booksEdit->genreGenreId)Selected @endif>{{$genres->type}}</option>
                        @endforeach
                      </select>
                      </div> 

                        <div class="col-sm-12 mb-3 mb-sm-0">

                                <label class="text-gray-800"><strong>Author</strong></label>
                               
                        </div> 
                        <div class="col-sm-12 mb-3 mb-sm-0">
                        <select name="authorAuthorId" class="form-control">
                        <option value="">Select Author</option>
                        @foreach($author as $authors)
                        <option value="{{$authors->authorId}}"@if($authors->authorId==$booksEdit->authorAuthorId)Selected @endif>{{$authors->authorName}}</option>
                        @endforeach
                        </select>
                        </div> 
                  

                        <br>             
                           
                                                <div class="form-group row">
                                               
                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                <input type="submit" class="btn  btn-info btn-block"  value="Add Book">
                                                </div>
                                                @if(Auth::user()->userPrivilegeId==2)
                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                                
                                                                <button type="button" class="btn  btn-danger btn-block" data-toggle="modal" data-target="#deleteModal">Delete</button>
                                                                </div>
                                                @endif
                                               <div class="col-sm-4 mb-3 mb-sm-0">
                                               <a class="btn  btn-dark btn-block " href="books-list">Book List</a>
                                               </div>
                </form>
                        </div>
                    </div> 
                </div>
  <!-- DELETE MODAL-->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure to delete this user ?</div>
                <div class="modal-footer">
				<form action="books-delete" method="post">
				<input type="hidden" name="_token" value="{{csrf_token()}}"/>
				<input type="hidden" name="BooksId" value="{{$booksEdit->BooksId}}">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-danger" value="Delete"/>
				</form>	
                </div>
            </div>
        </div>
    </div>

@endsection