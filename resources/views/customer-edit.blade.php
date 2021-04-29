
@extends('master')

@section('keywords','bazil books')
@section('description','Books Books And more Books')
@section('title','Customer Edit')


@section('content')

        <div class="card shadow mb-4">                          
            <div class="card-header py-3"> 
            <h1 class="h3 mb-2 text-gray-800 text-center">Edit Customer Information</h1>
            
            <div class="col-md-6">            
            </div>                  
              <div class="card-body">

                <div class="form-group">


        <form action="customer-edit" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <input type="hidden" name="customerId" value="{{$customerEdit->customerId}}"/>


                                                    <!--  Success Message  -->

                                                    @if(Session::has('successmsg'))

                                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        <strong>{{Session::get('successmsg')}}</strong> 
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>


                                                    @endif
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

                                <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label class="text-gray-800"><strong>Customer Name</strong></label>
                                        <input class="form-control py-4 " name="customerName" maxlength="45" type="text" placeholder=" " value="{{$customerEdit->customerName}}" />
                                </div> 
                                <div class="col-sm-12 mb-3 mb-sm-0">          
                                        <label class="text-gray-800"><strong></strong>Customer Phone</label>
                                        <input class="form-control py-4" name="customerPhone" maxlength="20" type="text" placeholder=" " value="{{$customerEdit->customerPhone}}" />
                                </div>
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label class="text-gray-800"><strong></strong>Customer Email</label>
                                        <input class="form-control py-4" name="customerEmail" maxlength="45" type="text" placeholder="" value="{{$customerEdit->customerEmail}}" />
                                </div> 
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label class="text-gray-800"><strong></strong>Customer Address</label>
                                        <input class="form-control py-4" name="customerAddress" maxlength="45" type="text" placeholder="" value="{{$customerEdit->customerAddress}}" />
                                </div> 
                                
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                
                              
                                                </div>  <br>           
                                   
                                                        <div class="form-group row">
                                                       
                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                        <input type="submit" class="btn  btn-info btn-block"  value="Update">
                                                        </div>
                                                        @if(Auth::user()->userPrivilegeId==1)  
                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                        
                                                        <button type="button" class="btn  btn-danger btn-block" data-toggle="modal" data-target="#deleteModal">Delete</button>

                                                     </div>
                                                     @endif
                                                        <br>     
                                                         <!--Accessible to all-->
                                                       
                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                        <a class="btn  btn-dark btn-block " href="customer-list">Customer List</a>
                                                        </div>
                                                       
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
				<form action="customer-delete" method="post">
				<input type="hidden" name="_token" value="{{csrf_token()}}"/>
				<input type="hidden" name="customerId" value="{{$customerEdit->customerId}}">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-danger" value="Delete"/>
				</form>	
                </div>
            </div>
        </div>
    </div>



@endsection