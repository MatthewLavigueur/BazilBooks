<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Customer;
use App\Payment;
use App\Privilege;
use App\Genre;
use App\Publisher;
use Validator;
use Hash;

class PublisherController extends Controller
{
    public function index(){
		return view('publisher');
	}

    public function save(Request $request){
        // return $request;


        $inputs =$request->all();
		$rules= array(

                'publisherName'=>'required|max:45',
                'publisherAddress'=>'required|max:45',
                'publisherPhone'=>'required|max:45',
                'publisherEmail'=>'required|max:45',
           

        );
                $validation = Validator::make($inputs, $rules);
                if($validation->fails())
                {
                        return redirect()->back()
                        ->withErrors($validation)
                        ->withInput();
                }else{

                $publisher = new publisher();
                $publisher->fill($request->all());
                $publisher->save();

                $msg="Success";
                return redirect()->back()->with('successmsg', $msg);
        }
    }
    public function publisherList(){
     
        // $publisherList = Publisher::Select()->get();

        $publisherList = New Publisher();
        $publisherList = $publisherList->selectPublisher();


        // return $publisherList;

        
        return view('publisher-list', [

                            "publisherList" => $publisherList,
            
                                    ]);
    }

    public function publisherEdit($id)
    {
	$edit = Publisher::find($id);

	return view('publisher-edit',[

        "publisherEdit" => $edit,
     ]);
    }

    public function publisherEditPost(Request $request){
        // return $request;

        $savePublisherEdit = Publisher::find($request->publisherId);
        $inputs =$request->all();
		$rules= array(

            'publisherName'=>'required|max:45',
            'publisherAddress'=>'required|max:45',
            'publisherPhone'=>'required|max:45',
            'publisherEmail'=>'required|max:45',
    
        );
                $validation = Validator::make($inputs, $rules);
                if($validation->fails())
                {
                        return redirect()->back()
                        ->withErrors($validation)
                        ->withInput();
                }else{

                
                $savePublisherEdit->fill($request->all());
                $savePublisherEdit->save();

                $msg="Success";
                return redirect()->back()->with('successmsg', $msg);
        }
    }

    public function publisherDeletePost(Request $request)
	{
		$delete = Publisher::find($request->publisherId)->delete();

		return redirect('publisher-list');
	}
}