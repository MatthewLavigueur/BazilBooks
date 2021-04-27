<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Validator;
use Hash;
use Auth;

class LoginController extends Controller
{
    public function index(){
		return view('login');
	}

    public function authentication(Request $request)
    {
	//    return view('login');
    $username = $request->username;
    $password = $request->password;
    $salt = "@1883asd$%sssdd";


    //check if user exists
    $user = User::select()
        ->where('username','=',$username)
        ->get();
        
   
//count rows, must be one
        if($user->count()==1)    
        {   //check is passowrd matches
            if(Hash::check($password.$salt, $user[0]->password ))
            {                    //matches passowrd
                            if(Auth::attempt(['userId'=>$user[0]->userId, 'password'=>$password.$salt]))
                            {
                            return redirect('user-list');

                            }else{
                                
                                return view('/login',['errorLogin'=>'Login Failed']);
                            }
                    }else{
                            //wrong password
                            return view('/login',['errorLogin'=>'please check password!']);
                    }            
            }else{
                        //wrong username
                    return view('/login',['errorLogin'=>'please check user name!']);
        }

	}
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}