<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Privilege;
use Validator;
use Hash;

class RegisterController extends Controller
{

    public function index(){
		return view('register');
	}
	
	public function save(Request  $request){
		//return $request;


		$inputs =$request->all();
		$rules= array(
			'fName' =>'required|max:20',
			'lName' =>'required|max:20',
			'username' =>'required|email|max:100|unique:User,username',
			'password' =>'required|min:4|max:10|confirmed'

		);

		$validation = Validator::make($inputs, $rules);
		if($validation->fails())
		{
				return redirect()->back()
				->withErrors($validation)
				->withInput();
		}else{

			$salt = "@1883asd$%sssdd";

			$password = $request->password;
			$hashedPassword = Hash::make($password.$salt);		
				
			$user = new User(); 
			$user->fill($request->all());
			$user->password = $hashedPassword; 
			$user->save();
		
			$msg="Success !";
			return redirect()->back()->with('successmsg', $msg);

		}
	}

	public function userList()
	{
		// $userList = User::Select()->get();

		$userList = New User();
		$userList = $userList->selectUser();	
	
		return view('user-list',[

						"userList" => $userList,

		]);
	}
public function userEdit($id)
{
	$edit = User::find($id);

	$privilege = new Privilege();
	$privilege = $privilege->selectPrivilege();

	return view('user-edit', [

					"userEdit" => $edit,
					"privilege" => $privilege,

							]);

}

public function userEditPost(Request $request)
{

	$msg = "User Updated!";
	$saveEdit = User::find($request->userId);

	$inputs =$request->all();
		$rules= array(
			'fName' =>'required|max:20',
			'lName' =>'required|max:20',
			'password' =>'max:10|confirmed',
			'userPrivilegeId' => 'required'

		);
		$validation = Validator::make($inputs, $rules);
		if($validation->fails())
		{
				return redirect()->back()
				->withErrors($validation)
				->withInput();
		}else{
	// $saveEdit->fill($request->all());
	$saveEdit->fName = $request->fName;
	$saveEdit->lName = $request->lName;
	if($request->password!= null)
	{
		$salt = "@1883asd$%sssdd";

		$password = $request->password;
		
		$hashedPassword = Hash::make($password.$salt);	

		$saveEdit->password = $hashedPassword;
	}
	$saveEdit->userPrivilegeId = $request->userPrivilegeId;
	$saveEdit->save();

	return redirect()->back()->with('successmsg', $msg);
		}

	}

	public function userDeletePost(Request $request)
	{
		$delete = User::find($request->userId)->delete();

		return redirect('user-list');
	}



}




?>

