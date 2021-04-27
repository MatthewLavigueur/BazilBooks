<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Customer;
use App\Payment;
use App\Privilege;
use App\Genre;
use Validator;
use Hash;

class GenreController extends Controller
{
    public function index(){
		return view('genre');
	}

    public function save(Request $request){
        // return $request;


        $inputs =$request->all();
		$rules= array(

                'type'=>'required|max:45',
           

        );
                $validation = Validator::make($inputs, $rules);
                if($validation->fails())
                {
                        return redirect()->back()
                        ->withErrors($validation)
                        ->withInput();
                }else{

                $genre = new genre();
                $genre->fill($request->all());
                $genre->save();

                $msg="Success";
                return redirect()->back()->with('successmsg', $msg);
        }
    }

    public function genreList(){
     
        // $genreList = Genre::Select()->get();

        $genreList = New Genre();
        $genreList = $genreList->selectGenre();

        // return $genreList;

        
        return view('genre-list', [

                            "genreList" => $genreList,
            
                                    ]);

    }

    public function genreEdit($id)
    {
	$edit = Genre::find($id);

	return view('genre-edit',[

        "genreEdit" => $edit,
     ]);
    }

    public function genreEditPost(Request $request){
        // return $request;

        $saveGenreEdit = Genre::find($request->genreId);
        $inputs =$request->all();
		$rules= array(

                'type'=>'required|max:45',
           
        );

                $validation = Validator::make($inputs, $rules);
                if($validation->fails())
                {
                        return redirect()->back()
                        ->withErrors($validation)
                        ->withInput();
                }else{

                
                $saveGenreEdit->fill($request->all());
                $saveGenreEdit->save();

                $msg="Success";
                return redirect()->back()->with('successmsg', $msg);
        }
    }

    public function genreDeletePost(Request $request)
	{
		$delete = Genre::find($request->genreId)->delete();

		return redirect('genre-list');
	}
}