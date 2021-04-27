<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Customer;
use App\Privilege;
use Validator;
use Hash;

class CustomerController extends Controller
{
    public function index(){
		return view('customer');
	}
	
    public function save(Request $request){
        // return $request;


        $inputs =$request->all();
		$rules= array(

                'customerName'=>'required|max:45',
                'customerPhone'=>'required', // regex:/^\(?([2-9][0-8][0-9])\)?[-. ]?([2-9][0-9]{2})[-. ]?([0-9]{4})$'
                'customerEmail'=>'required|email|max:45',
                'customerAddress'=>'required|max:45'

        );
                $validation = Validator::make($inputs, $rules);
                if($validation->fails())
                {
                        return redirect()->back()
                        ->withErrors($validation)
                        ->withInput();
                }else{

                $customer = new customer();
                $customer->fill($request->all());
                $customer->save();

                $msg="Success";
                return redirect()->back()->with('successmsg', $msg);
        }
    }

    public function customerList(){
     
        // $customerList = Customer::Select()->get();

        $customerList = New Customer();
        $customerList = $customerList->selectCustomer();


        //return $customerList;

        
        return view('customer-list', [

                            "customerList" => $customerList,
            
                                    ]);

    }

    public function customerEdit($id)
    {
	$edit = Customer::find($id);

	return view('customer-edit',[

        "customerEdit" => $edit,
     ]);
    }

   public function customerEditPost(Request $request)
   {
      $saveEdit = Customer::find($request->customerId);
      $inputs =$request->all();
      $rules= array(
        'customerName'=>'required|max:45',
        'customerPhone'=>'required', // regex:/^\(?([2-9][0-8][0-9])\)?[-. ]?([2-9][0-9]{2})[-. ]?([0-9]{4})$'
        'customerEmail'=>'required|email|max:45',
        'customerAddress'=>'required|max:45'

      );
                $validation = Validator::make($inputs, $rules);
                if($validation->fails())
                {
                        return redirect()->back()
                        ->withErrors($validation)
                        ->withInput();
                }else{

                        $saveEdit->fill($request->all());
                        $saveEdit->save();

                        $msg="Success";
                        return redirect()->back()->with('successmsg', $msg);
                    } 
    }

    public function customerDeletePost(Request $request)
	{
		$delete = Customer::find($request->customerId)->delete();

		return redirect('customer-list');
	}
}