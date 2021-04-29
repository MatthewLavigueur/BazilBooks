@extends('master')

@section('keywords','bazil books')
@section('description','Books Books And more Books!')
@section('title','Update Publisher')

@section('content')


<div class="card shadow mb-4">                          
            <div class="card-header py-3"> 
            <h1 class="h3 mb-2 text-gray-800 text-center">Edit Publisher</h1>          
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

                <form class="publisher" action="publisher-edit" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <input type="hidden" name="publisherId" value="{{$publisherEdit->publisherId}}"/>
                
                        <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="text-gray-800"><strong>Publisher Name</strong></label>
                                <input class="form-control py-4 " name="publisherName" type="text" placeholder="Publisher Name" value="{{$publisherEdit->publisherName}}" maxlength="45"  />
                        </div> 

                        <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="text-gray-800"><strong>Publisher Address</strong></label>
                                <input class="form-control py-4 " name="publisherAddress" type="text" placeholder="Publisher Address" value="{{$publisherEdit->publisherAddress}}" maxlength="45"  />
                        </div> 

                        <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="text-gray-800"><strong>Publisher Phone</strong></label>
                                <input class="form-control py-4 " name="publisherPhone" type="text" placeholder="Publisher Phone" value="{{$publisherEdit->publisherPhone}}" maxlength="45"  />
                        </div> 

                        <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="text-gray-800"><strong>Publisher Email</strong></label>
                                <input class="form-control py-4 " name="publisherEmail" type="text" placeholder="Publisher Email" value="{{$publisherEdit->publisherEmail}}" maxlength="45"  />
                        </div> 
        
                        
                        <div class="col-sm-12 mb-3 mb-sm-0">              
                      
                                        </div>  <br>           
                           
                                                <div class="form-group row">
                                               
                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                <input type="submit" class="btn  btn-info btn-block"  value="Update Publisher">
                                                </div>
                                                @if(Auth::user()->userPrivilegeId==1)  
                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                        
                                                        <button type="button" class="btn  btn-danger btn-block" data-toggle="modal" data-target="#deleteModal">Delete</button>

                                                     </div>
                                                     @endif
                                         
                                               
                                               <div class="col-sm-4 mb-3 mb-sm-0">
                                               <a class="btn  btn-dark btn-block " href="publisher-list">Publisher List</a>
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
				<form action="publisher-delete" method="post">
				<input type="hidden" name="_token" value="{{csrf_token()}}"/>
				<input type="hidden" name="publisherId" value="{{$publisherEdit->publisherId}}">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-danger" value="Delete"/>
				</form>	
                </div>
            </div>
        </div>
    </div>

@endsection