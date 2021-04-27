<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Customer;
use App\Payment;
use App\Privilege;
use App\Genre;
use App\Country;
use Validator;
use Hash;

class CountryController extends Controller
{
    public function index(){
		return view('country');
	}

    public function save(Request $request){
        // return $request;


        $inputs =$request->all();
		$rules= array(

                'country'=>'required|max:45',
           

        );
                $validation = Validator::make($inputs, $rules);
                if($validation->fails())
                {
                        return redirect()->back()
                        ->withErrors($validation)
                        ->withInput();
                }else{

                $country = new country();
                $country->fill($request->all());
                $country->save();

                $msg="Success";
                return redirect()->back()->with('successmsg', $msg);
        }
    }
    public function countryList(){
     
        // $countryList = Genre::Select()->get();

        $countryList = New Country();
        $countryList = $countryList->selectCountry();


        // return $countryList;

        
        return view('country-list', [

                            "countryList" => $countryList,
            
                                    ]);

    

    }

    public function countryEdit($id)
    {
	$edit = Country::find($id);

	return view('country-edit',[

        "countryEdit" => $edit,
     ]);
    }

    public function countryEditPost(Request $request){
        // return $request;

        $saveEdit = Country::find($request->countryId);

        $inputs =$request->all();
		$rules= array(

                'country'=>'required|max:45',
           
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
	public function countryDeletePost(Request $request)
	{
		$delete = Country::find($request->countryId)->delete();

		return redirect('country-list');
	}



}