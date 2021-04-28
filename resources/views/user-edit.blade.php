@extends('master')

@section('keywords','bazil books')
@section('description','Books Books And more Books')
@section('title','User List')


@section('content')
<!--Page content-->




        <div class="card shadow mb-4">                          
            <div class="card-header py-3"> 
            <h1 class="h3 mb-2 text-gray-800 text-center">Edit User Information</h1>

            
                                         @if(Auth::user()->userPrivilegeId==2)
                                        <h1 class="h3 mb-2 text-canger-800 text-center text-danger">Access Denied</h1>
                                        @endIf
            
            <div class="col-md-6">
            
            </div> 
                 
                <div class="card-body">

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
                <div class="form-group">

        <form action="user-edit" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>

 <!-- Manager access start -->   @if(Auth::user()->userPrivilegeId==1)
				<input type="hidden" name="userId" value="{{$userEdit->userId}}"/>
                
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label class="text-gray-800"><strong>First Name</strong></label>
                                        <input class="form-control py-4 " name="fName" maxlength="20" type="text" placeholder="First name" value="{{$userEdit->fName}}" />
                                </div> 
                                <div class="col-sm-12 mb-3 mb-sm-0">          
                                        <label class="text-gray-800"><strong>Last Name</strong></label>
                                        <input class="form-control py-4" name="lName" maxlength="20" type="text" placeholder="Last name" value="{{$userEdit->lName}}" />
                                </div>
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label class="text-gray-800"><strong>Password</strong></label>
                                        <input class="form-control py-4" name="password" maxlength="20" type="password" placeholder="Password" value="" />
                                </div> 
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                        <label class="text-gray-800"><strong>Confirm Password</strong></label>
                                        <input class="form-control py-4" name="password_confirmation" maxlength="20" type="password" placeholder="Confirm Password" value="" />
                                </div> 
                                
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                
                                <label class="text-gray-800"><strong>Privilege</strong></label>
                                        <select name="userPrivilegeId" class="form-control">
                                        <option value="">Select Privilege</option>
                                
                                                @foreach($privilege as $privileges)
                                                <option  value="{{$privileges->privilegeId}}" @if($privileges->privilegeId==$userEdit->userPrivilegeId)Selected @endif>{{$privileges->privilege}}</option>
                                                @endforeach
                                                </select>
                              
                                                </div>  <br>           
                                   
                                                        <div class="form-group row">
                                                       
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="submit" class="btn  btn-info btn-block"  value="Update">
                                                        </div>

                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                                
                                                        <button type="button" class="btn  btn-danger btn-block" data-toggle="modal" data-target="#deleteModal">Delete</button>
 <!-- Manager access end -->    @endIf
                                                </div>
                                                        <br>     
                                                        </div> <!--Accessible to all-->
                                                        <a class="btn  btn-dark btn-block " href="user-list">User List</a>
			        
                
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
				<form action="user-delete" method="post">
				<input type="hidden" name="_token" value="{{csrf_token()}}"/>
				<input type="hidden" name="userId" value="{{$userEdit->userId}}">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-danger" value="Delete"/>
				</form>	
                </div>
            </div>
        </div>
    </div>


@endsection