@extends('master')

@section('keywords','bazil books')
@section('description','Books Books And more Books!')
@section('title','Add Country')

@section('content')


<div class="card shadow mb-4">                          
            <div class="card-header py-3"> 
            <h1 class="h3 mb-2 text-gray-800 text-center">Add Country</h1>          
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

                <form  action="country-edit" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <input type="hidden" name="countryId" value="{{$countryEdit->countryId}}"/>
                
                        <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="text-gray-800"><strong>Country</strong></label>
                                <input class="form-control py-4 " name="country" type="text" placeholder="country" value="{{$countryEdit->country}}" maxlength="45"  />
                        </div> 
        
                        
                        <div class="col-sm-12 mb-3 mb-sm-0">              
                      
                                        </div>  <br>           
                           
                                                <div class="form-group row">
                                               
                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                <input type="submit" class="btn  btn-info btn-block"  value="Update Country">
                                                </div>
                                         
                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                                
                                                                <button type="button" class="btn  btn-danger btn-block" data-toggle="modal" data-target="#deleteModal">Delete</button>
        
                                                        </div>
                                               
                                               <div class="col-sm-4 mb-3 mb-sm-0">
                                               <a class="btn  btn-dark btn-block " href="country-list">Country List</a>
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
				<form action="country-delete" method="post">
				<input type="hidden" name="_token" value="{{csrf_token()}}"/>
				<input type="hidden" name="countryId" value="{{$countryEdit->countryId}}">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-danger" value="Delete"/>
				</form>	
                </div>
            </div>
        </div>
    </div>

@endsection