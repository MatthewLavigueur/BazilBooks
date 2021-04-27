<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Customer;
use App\Payment;
use App\Privilege;
use App\Genre;
use App\Author;
use App\Country;
use Validator;
use Hash;

class AuthorController extends Controller
{
    public function index(){

        $country = new Country();
        $country = $country->selectCountry();


		return view('author', [
                        "country" => $country,
        ]);
	}

    public function save(Request $request){
        // return $request;

        

        $inputs =$request->all();
		$rules= array(

                'authorName'=>'required|max:45',
                'authorBirthday'=>'required|max:45',
                'countryCountryId'=>'required',

           

        );
                $validation = Validator::make($inputs, $rules);
                if($validation->fails())
                {
                        return redirect()->back()
                        ->withErrors($validation)
                        ->withInput();
                }else{

                $author = new author();
                $author->fill($request->all());
                $author->save();

                $msg="Success";
                return redirect()->back()->with('successmsg', $msg);
        }
    }

    public function authorList(){
     
        // $authorList = Author::Select()->get();
        $authorList = New Author();
        $authorList = $authorList->selectAuthor();
        // return $authorList;

        
        return view('author-list', [

                            "authorList" => $authorList,
            
                                    ]);

    }

    public function authorEdit($id)
    {
	$edit = author::find($id);

    $country = new Country();
    $country = $country->selectCountry();

	return view('author-edit',[

        "authorEdit" => $edit,
        "country" => $country,
     ]);
    }

    public function authorEditPost(Request $request){   
        
        $authorSaveEdit = Author::find($request->authorId);

        $inputs =$request->all();
		$rules= array(

                'authorName'=>'required|max:45',
                'authorBirthday'=>'required|max:45',
                'countryCountryId'=>'required',

        );
                $validation = Validator::make($inputs, $rules);
                if($validation->fails())
                {
                        return redirect()->back()
                        ->withErrors($validation)
                        ->withInput();
                }else{

               
                $authorSaveEdit->fill($request->all());
                $authorSaveEdit->save();

                $msg="Success";
                return redirect()->back()->with('successmsg', $msg);
        }
    }

    public function authorDeletePost(Request $request)
	{
		$deleteAuthor = Author::find($request->authorId)->delete();

		return redirect('author-list');
	}
}