@extends('master')

@section('keywords','bazil books')
@section('description','Books Books And more Books!')
@section('title','Add Author')

@section('content')


<div class="card shadow mb-4">                          
            <div class="card-header py-3"> 
            <h1 class="h3 mb-2 text-gray-800 text-center">Add Author</h1>          
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

                <form class="author" action="author-insert" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <input type="hidden" name="countryCountryId" value="1">
                
                        <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="text-gray-800"><strong>Author Name</strong></label>
                                <input class="form-control py-4 " name="authorName" type="text" placeholder="Author Name" value="{{old('authorName')}}" maxlength="45"  />
                        </div> 

                        <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="text-gray-800"><strong>Author Birthday</strong></label>
                                <input class="form-control py-4 " name="authorBirthday" type="text" placeholder="yyyy-mm-dd" value="{{old('authorBirthday')}}" maxlength="45"  />
                        </div> 

                        <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="text-gray-800"><strong>Country</strong></label>
                               
                        </div> 
                        <div class="col-sm-12 mb-3 mb-sm-0">
                        <select name="countryCountryId" class="form-control">
                        <option value="">Select Country</option>
                        @foreach($country as $countries)
                        <option value="{{$countries->countryId}}">{{$countries->country}}</option>
                        @endforeach
                        </select>
                        </div> 


                        <br>
                   
                           
                                                <div class="form-group row">
                                               
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="submit" class="btn  btn-info btn-block"  value="Add Author">
                                                </div>
                                         
                                               
                                               <div class="col-sm-6 mb-3 mb-sm-0">
                                               <a class="btn  btn-dark btn-block " href="author-list">Author List</a>
                                               </div>
                </form>
                        </div>
                    </div> 
                </div>

@endsection