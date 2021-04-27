@extends('master')

@section('keywords','bazil books')
@section('description','Books Books And more Books!')
@section('title','Add Customers')

@section('content')


<div class="card shadow mb-4">                          
            <div class="card-header py-3"> 
            <h1 class="h3 mb-2 text-gray-800 text-center">Add Customer</h1>          
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

                <form class="customer" action="customer-insert" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                
                        <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="text-gray-800"><strong>Customer Name</strong></label>
                                <input class="form-control py-4 " name="customerName" maxlength="20" type="text" placeholder="" value="{{old('customerName')}}" maxlength="45"  />
                        </div> 
                        <div class="col-sm-12 mb-3 mb-sm-0">          
                                <label class="text-gray-800"><strong>Customer Phone</strong></label>
                                <input class="form-control py-4" name="customerPhone" maxlength="20" type="text" placeholder="" value="{{old('customerPhone')}}" maxlength="20"  />
                        </div>
                        <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="text-gray-800"><strong>Customer Email</strong></label>
                                <input class="form-control py-4" name="customerEmail" maxlength="20" type="email" placeholder="" value="{{old('customerEmail')}}" maxlength="45" />
                        </div> 
                        <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="text-gray-800"><strong>Customer Address</strong></label>
                                <input class="form-control py-4" name="customerAddress" maxlength="20" type="text" placeholder="" value="{{old('customerAddress')}}" maxlength="45" />
                        </div> 
                        
                        <div class="col-sm-12 mb-3 mb-sm-0">              
                      
                                        </div>  <br>           
                           
                                                <div class="form-group row">
                                               
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="submit" class="btn  btn-info btn-block"  value="Add Customer">
                                                </div>
                                         
                                               
                                               <div class="col-sm-6 mb-3 mb-sm-0">
                                               <a class="btn  btn-dark btn-block " href="customer-list">Customer List</a>
                                               </div>
                </form>
                        </div>
                    </div> 
                </div>

@endsection