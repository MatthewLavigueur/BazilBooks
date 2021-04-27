<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Customer;
use App\Payment;
use App\Privilege;
use Validator;
use Hash;

class PaymentController extends Controller
{
    public function index(){
		return view('payment');
	}

    public function save(Request $request){
        // return $request;


        $inputs =$request->all();
		$rules= array(

                'Type'=>'required|max:45',
           

        );
                $validation = Validator::make($inputs, $rules);
                if($validation->fails())
                {
                        return redirect()->back()
                        ->withErrors($validation)
                        ->withInput();
                }else{

                $payment = new payment();
                $payment->fill($request->all());
                $payment->save();

                $msg="Success";
                return redirect()->back()->with('successmsg', $msg);
        }
    }

    public function paymentList(){
     
        // $paymentList = Payment::Select()->get();

        $paymentList = New Payment();
        $paymentList = $paymentList->selectPayment();


        // return $paymentList;

        
        return view('payment-list', [

                            "paymentList" => $paymentList,
            
                                    ]);

    }

    public function paymentEdit($id)
    {
	$edit = Payment::find($id);

	return view('payment-edit',[

        "paymentEdit" => $edit,
     ]);
    }

    public function paymentEditPost(Request $request){
        // return $request;

        $savePaymentEdit = Payment::find($request->paymentId);
        $inputs =$request->all();
		$rules= array(

                'Type'=>'required|max:45',
           

        );
                $validation = Validator::make($inputs, $rules);
                if($validation->fails())
                {
                        return redirect()->back()
                        ->withErrors($validation)
                        ->withInput();
                }else{

                
                $savePaymentEdit->fill($request->all());
                $savePaymentEdit->save();

                $msg="Success";
                return redirect()->back()->with('successmsg', $msg);
        }
    }

    public function paymentDeletePost(Request $request)
	{
		$delete = Payment::find($request->PaymentId)->delete();

		return redirect('payment-list');
	}

}