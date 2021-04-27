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

                <form class="books" action="books-insert" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <input type="hidden" name="publisherPublisherId" value="1">
                <input type="hidden" name="genreGenreId" value="1">
                <input type="hidden" name="authorAuthorId" value="1">
                
                        <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="text-gray-800"><strong>Book Title</strong></label>
                                <input class="form-control py-4 " name="title" type="text" placeholder="Book Title" value="{{old('title')}}" maxlength="100"  />
                        </div> 

                        <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="text-gray-800"><strong>Hardcover</strong></label>
                                <input class="form-control py-4 " name="hardCover" type="text" placeholder="Y/N" value="{{old('hardCover')}}" maxlength="1"  />
                        </div> 
                        <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="text-gray-800"><strong>Paperback</strong></label>
                                <input class="form-control py-4 " name="paperBack" type="text" placeholder="Y/N" value="{{old('paperBack')}}" maxlength="1"  />
                        </div> 
                        <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="text-gray-800"><strong>Instock</strong></label>
                                <input class="form-control py-4 " name="inStock" type="text" placeholder="Enter Number of Books" value="{{old('inStock')}}" maxlength="1"  />
                        </div> 
                        <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="text-gray-800"><strong>Description</strong></label>
                               <textarea class="form-control py-4" name="description" cols="10" rows="3" value="{{old('description')}}"></textarea>
                        </div> 
                        <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="text-gray-800"><strong>Book Price</strong></label>
                                <input class="form-control py-4 " name="bookPrice" type="text" placeholder="Enter Price" value="{{old('bookPrice')}}" maxlength="20"  />
                        </div> 
                        <div class="col-sm-12 mb-3 mb-sm-0">

                                <label class="text-gray-800"><strong>Publisher</strong></label>
                               
                        </div> 
                        <div class="col-sm-12 mb-3 mb-sm-0">
                        <select name="publisherPublisherId" class="form-control">
                        <option value="">Select Publisher</option>
                        @foreach($publisher as $publishers)
                        <option value="{{$publishers->publisherId}}">{{$publishers->publisherName}}</option>
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
                        <option value="{{$genres->genreId}}">{{$genres->type}}</option>
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
                        <option value="{{$authors->authorId}}">{{$authors->authorName}}</option>
                        @endforeach
                        </select>
                        </div> 
                  

                        <br>
                   
                           
                                                <div class="form-group row">
                                               
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="submit" class="btn  btn-info btn-block"  value="Add Book">
                                                </div>
                                         
                                               
                                               <div class="col-sm-6 mb-3 mb-sm-0">
                                               <a class="btn  btn-dark btn-block " href="books-list">Book List</a>
                                               </div>
                </form>
                        </div>
                    </div> 
                </div>

@endsection