@extends('master')

@section('keywords','bazil books')
@section('description','Books Books And more Books')
@section('title','Invoice')


@section('content')
<!--Page content-->




        <div class="card shadow mb-4">                          
            <div class="card-header py-3"> 
            <h1 class="h3 mb-2 text-gray-800 text-center">Invoice</h1>

            
                                         
                                       
                                       
            
            <div class="col-md-6">
            
            </div> 
                 
                <div class="card-body">

                   <!--  Success Message  -->
                   @if(!isset($invoice))

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
                                                  @endif
                <div class="form-group">

        <form action="invoice" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <input type="hidden" name="customerCustomerId" value="1"/>
				<input type="hidden" name="paymentPaymentId" value="1"/>



                        <div class="col-sm-12 mb-3 mb-sm-0">   
                        <label class="text-gray-800"><strong>Date:</strong></label>
                     
                        @if(isset($invoice))
                                {{$invoice->created_at}}
                            @else
                                 Auto Generated
                            @endif
                            <br>
                        </div>
                           
                                <div class="col-sm-12 mb-3 mb-sm-0">   
                                <label class="text-gray-800"><strong>Discount:</strong></label>
                                            @if(isset($invoice))
                                                {{$invoice->discount}}
                                            @else  
                                            @if(Auth::user()->userPrivilegeId==1)
                                                <input class="form-control py-4" name="discount" maxlength="20" type="text" placeholder="Enter Discount" value="{{old('discount')}}" />
                                             @endif
                                                                        @endif
        
                                </div>
                              
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="text-gray-800"><strong>Customer:</strong></label>
                                                    
                                                    @if(isset($invoice))<br> 
                                                        {{$invoice->invoiceHasCustomer->customerName}}<br> 
                                                        {{$invoice->invoiceHasCustomer->customerPhone}}<br> 
                                                        {{$invoice->invoiceHasCustomer->customerEmail}}<br> 
                                                        {{$invoice->invoiceHasCustomer->customerAddress}}<br> 
                                                    @else 
                                                        
                                                <select name="customerCustomerId" class="form-control">
                                                <option value="">Select Customer</option>                                       
                                                 @foreach($customer as $customers)
                                                        <option  value="{{$customers->customerId}}" @if($customers->customerId==old('customerCustomerId')) Selected @endif>{{$customers->customerName}}</option>
                                                  @endforeach
                                                  </select> 
                                                     @endif

                                                    <br><!--separate fields-->
                                                  <label class="text-gray-800"><strong>Payment:</strong></label>
                                                  @if(isset($invoice))
                                                {{$invoice->invoiceHAsPayment->Type}}
                                                @else 
                                                        
                                             
                                                <select name="paymentPaymentId" class="form-control">
                                                <option value="">Select Payment</option>
                                                @foreach($payment as $payments)
                                                           <option  value="{{$payments->PaymentId}}" @if($payments->PaymentId==old('paymentPaymentId')) Selected @endif >{{$payments->Type}}</option>         
                                                @endforeach
                                                </select>
                                              @endif
                                                </div>  <br>            
                                   
                                                            <div class="form-group row">
                                                           
                                                      

                                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                        @if(isset($invoice))
                                                        <button type="button" class="btn  btn-success btn-block" data-toggle="modal" data-target="#addModal">Add Book</button>
                                                        @endif
                                                            </div>
                                                        <br> 
                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                        @if(!isset($invoice))
                                                        <input type="submit" class="btn  btn-info btn-block"  value="Save">
                                                        @else
                                                        <a href="invoicePDF-{{$invoice->invoiceId}}" class="btn  btn-info btn-block">Download PDF</a>
                                                       @endif
                                                        </div>    
                                                     
                                                      
                                                        <div class="col-sm-4 mb-3 mb-sm-0">
                                                        @if(isset($invoice))
                                                        <a class="btn  btn-dark btn-block " href="invoice">New Invoice</a>
                                                        @endif
                                                            </div>
                                                            </div> <!--Accessible to all-->
                
                
        </form>
                                </div>
                                </div> 
                        </div>

                      

                        @if(isset($invoice))
                        <table class="table table-dark table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <tr>
                            <th>Quantity</th>
                            <th>Book Title</th>
                            <th>Price</th>
                            <th>Total</th>
                                           
                        </tr>
                </thead>
                <tbody>
                @foreach($invoiceBooks as $row)
                        <tr>
                            <td>{{$row->quantity}}</td>
                            <td>{{$row->title}}</td>
                            <td>${{$row->price}} each </td>
                            <td>${{$row->price * $row->quantity}}  </td>

 
                        </tr>
                @endforeach
                </table>
                        @endif

 

                        @if(isset($invoice))

  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Book</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>

                </div>
                <div class="modal-body">
                <form action="add-book" method="post">
				<input type="hidden" name="_token" value="{{csrf_token()}}"/>

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

                <input type="hidden" name="iIBooksId" value="{{$invoice->invoiceId}}">
                <label class="text-gray-800"><strong>Quantity:</strong></label>
                        <div class="col-sm-4 mb-3 mb-sm-0">
               <input class="form-control" type="text" name="quantity" value="{{old('quantity')}}" >
                        </div>

                <label class="text-gray-800"><strong>Book Title:</strong></label>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                        <select name="bIInvoiceId" class="form-control">
                                                <option value="">Select Book</option>
                                                @foreach($books as $book)
                                                <option value="{{$book->BooksId}}">{{$book->title}}- ${{$book->bookPrice}}</option>
                                                @endforeach
                        </select>                        
                        </div>  
                        
                <label class="text-gray-800"><strong>Price:</strong></label>        
                        <div class="col-sm-4 mb-3 mb-sm-0">
				<input class="form-control" type="text" name="price" value="{{old('price')}}">
                        </div>
                    
                </div>
           
            
                <div class="modal-footer">
				
               
                    
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-success" value="Add"/>
				</form>	
                </div>
            </div>
        </div>
    </div>
  @endif

  @if(!isset($invoice))
  <div class="card shadow mb-4">                          
            <div class="card-header py-3"> 
            <h1 class="h3 mb-2 text-gray-800 text-center">Invoice List Information</h1>
            

            <div class="card-body">
            </div>
                 </div>
                <div class="card-body">
                <div class="table-responsive">
               
                                    <table class="table table-dark table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <tr>
                            <th>Invoice Id</th>
                            <th>Customer</th>
                            <th>Payment Type</th>
                            <th>Date</th>                           
              
                        </tr>
                </thead>
                <tbody>
                @foreach($invoiceList as $row)

               
                        <tr>
                            <td>{{$row->invoiceId}}</td>
                            <td>{{$row->invoiceHasCustomer->customerName}}</td>
                            <td>{{$row->invoiceHAsPayment->Type}}</td>
                            
                            <td><a class="list-group-item list-group-item-action list-group-item-dark" href="invoice-{{$row->invoiceId}}">{{$row->created_at}}</a></td>   


                                        
                        </tr>
                 @endforeach

                </tbody>
            </table>
            <br>
           
                                        
                                              
            </div>
        </div>
    </div>
  
</div>
@endif
@endsection