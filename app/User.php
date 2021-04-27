<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = "User";
    protected $primaryKey = "userId";
    protected $fillable = [

                'username',
                'password',
                'fName',
                'lName',
                'created_at',
                'updated_at',
                'userPrivilegeId'
    ];

    public function selectUser()
    {
        $query = User::Select()->orderby('fName')->get();
        return $query;
    }

	public function userHasPrivilege(){
        return $this->hasOne('App\Privilege','privilegeId','userPrivilegeId');
    }
			
}



?>